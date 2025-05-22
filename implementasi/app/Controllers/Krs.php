<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MataKuliahModel;
use App\Models\KrsModel;

class Krs extends BaseController
{
    public function index()
    {
        // Pastikan hanya mahasiswa yang bisa akses
        if (session()->get('role') !== 'mahasiswa') {
            return redirect()->to('/login')->with('error', 'Akses ditolak.');
        }

        $matakuliahModel = new MataKuliahModel();
        $data['matakuliah'] = $matakuliahModel->findAll();

        return view('mahasiswa/krs', $data);
    }

    public function store()
    {
        $krsModel = new KrsModel();
        $mahasiswa_id = session()->get('mahasiswa_id');

        if (!$mahasiswa_id) {
            return redirect()->to('/login')->with('error', 'Silakan login sebagai mahasiswa terlebih dahulu.');
        }

        $matakuliah_id = $this->request->getPost('matakuliah_id');
        $tahun_ajaran  = $this->request->getPost('tahun_ajaran');
        $semester      = $this->request->getPost('semester');

        // Validasi form
        if (!$matakuliah_id || !$tahun_ajaran || !$semester) {
            return redirect()->back()->with('error', 'Semua field wajib diisi.');
        }

        // Cegah KRS ganda
        $sudahAda = $krsModel->where([
            'mahasiswa_id' => $mahasiswa_id,
            'matakuliah_id' => $matakuliah_id
        ])->first();

        if ($sudahAda) {
            return redirect()->back()->with('error', 'Mata kuliah ini sudah Anda ambil.');
        }

        // Simpan data KRS
        $krsModel->insert([
            'mahasiswa_id'  => $mahasiswa_id,
            'matakuliah_id' => $matakuliah_id,
            'tahun_ajaran'  => $tahun_ajaran,
            'semester'      => $semester,
        ]);

        return redirect()->to('/dashboard/mahasiswa')->with('success', 'KRS berhasil disimpan.');
    }
    public function cetak()
{
    $mahasiswaId = session()->get('mahasiswa_id');

    if (!$mahasiswaId) {
        return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
    }

    $krsModel = new \App\Models\KrsModel();
    $mataKuliahModel = new \App\Models\MataKuliahModel();
    $mahasiswaModel = new \App\Models\MahasiswaModel();

    $mahasiswa = $mahasiswaModel->find($mahasiswaId);
    $krsList = $krsModel->where('mahasiswa_id', $mahasiswaId)->findAll();

    $matakuliahList = [];
    foreach ($krsList as $entry) {
        $mk = $mataKuliahModel->find($entry['matakuliah_id']);
        if ($mk) {
            $mk['tahun_ajaran'] = $entry['tahun_ajaran'];
            $mk['semester'] = $entry['semester'];
            $matakuliahList[] = $mk;
        }
    }

    return view('mahasiswa/cetak_krs', [
        'mahasiswa' => $mahasiswa,
        'matakuliah' => $matakuliahList
    ]);
}
public function hapus($id)
{
    $krsModel = new \App\Models\KrsModel();

    $krs = $krsModel->find($id);

    if (!$krs || $krs['mahasiswa_id'] != session()->get('mahasiswa_id')) {
        return redirect()->to('/dashboard/mahasiswa')->with('error', 'Data KRS tidak ditemukan atau akses ditolak.');
    }

    $krsModel->delete($id);
    return redirect()->to('/dashboard/mahasiswa')->with('success', 'KRS berhasil dihapus.');
}

}
