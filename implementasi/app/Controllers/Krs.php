<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\{MataKuliahModel, KrsModel, MahasiswaModel, SettingModel};
use CodeIgniter\Database\BaseBuilder;

class Krs extends BaseController
{
  public function index()
{
    if (session()->get('role') !== 'mahasiswa') {
        return redirect()->to('/login')->with('error', 'Akses ditolak.');
    }

    $mahasiswa_id = session()->get('mahasiswa_id');
    $krsModel = new \App\Models\KrsModel();

    // Ambil ID jadwal yang sudah dipilih
    $krs = $krsModel->where('mahasiswa_id', $mahasiswa_id)->findAll();
    $krs_jadwal_ids = array_column($krs, 'jadwal_id');

    // Input pencarian & pagination
    $keyword = $this->request->getGet('keyword');
    $perPage = 7;
    $page = (int) ($this->request->getGet('page') ?? 1);
    $offset = ($page - 1) * $perPage;

    // Query: JOIN matakuliah + jadwal
    $db = \Config\Database::connect();
    $builder = $db->table('jadwal');
$builder->select('
    matakuliah.*,
    jadwal.id as jadwal_id,
    jadwal.kelas
');

    $builder->join('matakuliah', 'matakuliah.id = jadwal.matakuliah_id', 'left');

    if ($keyword) {
        $builder->groupStart()
                ->like('matakuliah.nama', $keyword)
                ->orLike('matakuliah.kode', $keyword)
                ->groupEnd();
    }

    // Hitung total data untuk pagination
    $total_matkul = $builder->countAllResults(false);

    // Ambil data dengan limit
    $builder->limit($perPage, $offset);
    $matakuliah_paginated = $builder->get()->getResultArray();

    return view('mahasiswa/krs', [
        'matakuliah_paginated' => $matakuliah_paginated,
        'current_page'         => $page,
        'total_pages'          => ceil($total_matkul / $perPage),
        'krs_jadwal_ids'       => $krs_jadwal_ids,
        'keyword'              => $keyword,
    ]);
}



  public function store()
{
    $krsModel = new \App\Models\KrsModel();
    $mahasiswa_id = session()->get('mahasiswa_id');

    if (!$mahasiswa_id) {
        return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
    }

    $jadwal_ids = $this->request->getPost('jadwal_id');

    if (!$jadwal_ids || !is_array($jadwal_ids)) {
        return redirect()->back()->with('error', 'Silakan pilih minimal satu mata kuliah.');
    }

    $db = \Config\Database::connect();

    foreach ($jadwal_ids as $jadwal_id) {
        // Ambil jadwal termasuk data matakuliah
        $jadwal = $db->table('jadwal')
            ->select('jadwal.*, matakuliah.semester, matakuliah.tahun_ajaran, matakuliah.id as matakuliah_id')
            ->join('matakuliah', 'matakuliah.id = jadwal.matakuliah_id')
            ->where('jadwal.id', $jadwal_id)
            ->get()->getRowArray();

        if (!$jadwal) {
            continue;
        }

        // Cek apakah sudah ada
        $sudahAda = $krsModel->where([
            'mahasiswa_id' => $mahasiswa_id,
            'jadwal_id'    => $jadwal_id,
        ])->first();

        if ($sudahAda) {
            continue;
        }

        $krsModel->insert([
            'mahasiswa_id'  => $mahasiswa_id,
            'matakuliah_id' => $jadwal['matakuliah_id'],
            'jadwal_id'     => $jadwal_id,
            'tahun_ajaran'  => $jadwal['tahun_ajaran'],
            'semester'      => $jadwal['semester'],
        ]);
    }

    return redirect()->to('/dashboard/mahasiswa')->with('success', 'KRS berhasil disimpan.');
}



    public function hapus($id)
    {
        $krsModel = new KrsModel();
        $krs = $krsModel->find($id);

        if (!$krs || $krs['mahasiswa_id'] != session()->get('mahasiswa_id')) {
            return redirect()->to('/dashboard/mahasiswa')->with('error', 'Data tidak ditemukan atau akses ditolak.');
        }

        $krsModel->delete($id);
        return redirect()->to('/dashboard/mahasiswa')->with('success', 'KRS berhasil dihapus.');
    }

    public function cetak()
    {
        $mahasiswaId = session()->get('mahasiswa_id');

        if (!$mahasiswaId) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $mahasiswaModel = new MahasiswaModel();
        $mahasiswa = $mahasiswaModel->find($mahasiswaId);

        if (!$mahasiswa) {
            return redirect()->back()->with('error', 'Data mahasiswa tidak ditemukan.');
        }

        $settingModel = new SettingModel();
        $setting = $settingModel->first();

        if (!$setting) {
            return redirect()->back()->with('error', 'Tahun ajaran dan semester aktif belum disetting.');
        }

        $tahunAjaran = $setting['tahun_ajaran'];
        $semester = $setting['semester'];

        $krsModel = new KrsModel();
        $mataKuliahModel = new MataKuliahModel();

        $krsList = $krsModel->where([
            'mahasiswa_id' => $mahasiswaId,
            'tahun_ajaran' => $tahunAjaran,
            'semester' => $semester
        ])->findAll();

        $matakuliah = [];
        foreach ($krsList as $krs) {
            $mk = $mataKuliahModel->find($krs['matakuliah_id']);
            if ($mk) {
                $mk['is_approved'] = $krs['is_approved'];
                $mk['krs_id'] = $krs['id'];
                $matakuliah[] = $mk;
            }
        }

        return view('mahasiswa/cetak_krs', [
            'mahasiswa'     => $mahasiswa,
            'tahun_ajaran'  => $tahunAjaran,
            'semester'      => $semester,
            'matakuliah'    => $matakuliah
        ]);
    }

    public function approve()
    {
        $approveIds = $this->request->getPost('approve');

        if (!is_array($approveIds) || empty($approveIds)) {
            return redirect()->back()->with('info', 'Tidak ada KRS yang perlu disetujui.');
        }

        $krsModel = new KrsModel();

        foreach ($approveIds as $id) {
            $krsModel->update($id, ['is_approved' => 1]);
        }

        return redirect()->back()->with('success', 'KRS berhasil disetujui.');
    }
}
