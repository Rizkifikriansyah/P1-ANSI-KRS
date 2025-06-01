<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MataKuliahModel;
use App\Models\KrsModel;
use App\Models\MahasiswaModel;

class Krs extends BaseController
{
  public function index()
{
    if (session()->get('role') !== 'mahasiswa') {
        return redirect()->to('/login')->with('error', 'Akses ditolak.');
    }

    $mahasiswa_id = session()->get('mahasiswa_id');

    $matakuliahModel = new MataKuliahModel();
    $krsModel = new KrsModel();

    // Ambil ID matakuliah yang sudah dipilih mahasiswa
    $krs = $krsModel->where('mahasiswa_id', $mahasiswa_id)->findAll();
    $krs_matakuliah_ids = array_column($krs, 'matakuliah_id');

    // Ambil input pencarian
    $keyword = $this->request->getGet('keyword');

    // Pagination
    $perPage = 7;
    $page = (int) ($this->request->getGet('page') ?? 1);
    $offset = ($page - 1) * $perPage;

    // Query dengan pencarian
    $query = $matakuliahModel;

    if ($keyword) {
        $query = $query->groupStart()
                       ->like('nama', $keyword)
                       ->orLike('kode', $keyword)
                       ->groupEnd();
    }

    // Hitung total hasil pencarian
    $total_matkul = $query->countAllResults(false);

    // Ambil data hasil pencarian + pagination
    $matakuliah_paginated = $query->findAll($perPage, $offset);

    return view('mahasiswa/krs', [
        'matakuliah_paginated' => $matakuliah_paginated,
        'current_page' => $page,
        'total_pages' => ceil($total_matkul / $perPage),
        'krs_matakuliah_ids' => $krs_matakuliah_ids,
        'keyword' => $keyword, // dikirim ke view untuk mempertahankan input
    ]);
}




public function store()
{
    $krsModel = new KrsModel();
    $mahasiswa_id = session()->get('mahasiswa_id');

    if (!$mahasiswa_id) {
        return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
    }

    $matakuliah_ids = $this->request->getPost('matakuliah_id');

    if (!$matakuliah_ids || !is_array($matakuliah_ids)) {
        return redirect()->back()->with('error', 'Silakan pilih minimal satu mata kuliah.');
    }

    $matakuliahModel = new \App\Models\MatakuliahModel();

    foreach ($matakuliah_ids as $id) {
        // Cek apakah sudah pernah diinput
        $sudahAda = $krsModel->where([
            'mahasiswa_id' => $mahasiswa_id,
            'matakuliah_id' => $id
        ])->first();

        if ($sudahAda) {
            continue;
        }

        // Ambil data matakuliah untuk ambil semester dan tahun ajaran
        $mk = $matakuliahModel->find($id);
        if (!$mk) {
            continue; // skip kalau tidak ditemukan
        }

        $krsModel->insert([
            'mahasiswa_id'  => $mahasiswa_id,
            'matakuliah_id' => $id,
            'tahun_ajaran'  => $mk['tahun_ajaran'] ?? 'N/A',
            'semester'      => $mk['semester'] ?? 'N/A',
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

    // Ambil data mahasiswa
    $mahasiswaModel = new \App\Models\MahasiswaModel();
    $mahasiswa = $mahasiswaModel->find($mahasiswaId);

    if (!$mahasiswa) {
        return redirect()->back()->with('error', 'Data mahasiswa tidak ditemukan.');
    }

    // Ambil semester & tahun ajaran aktif dari setting
    $settingModel = new \App\Models\SettingModel();
    $setting = $settingModel->first();

    if (!$setting) {
        return redirect()->back()->with('error', 'Tahun ajaran dan semester aktif belum disetting.');
    }

    $tahunAjaran = $setting['tahun_ajaran'];
    $semester = $setting['semester'];

    // Ambil data KRS semester aktif
    $krsModel = new \App\Models\KrsModel();
    $mataKuliahModel = new \App\Models\MataKuliahModel();

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

    $krsModel = new \App\Models\KrsModel();

    foreach ($approveIds as $id) {
        $krsModel->update($id, ['is_approved' => 1]);
    }

    return redirect()->back()->with('success', 'KRS berhasil disetujui.');
}


}
