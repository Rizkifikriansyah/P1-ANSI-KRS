<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MataKuliahModel;
use App\Models\KrsModel;
use App\Models\MahasiswaModel;

class Dashboard extends BaseController
{
public function mahasiswa()
{
    $mahasiswaId = session()->get('mahasiswa_id');

    if (!$mahasiswaId) {
        return redirect()->to('/login')->with('error', 'Silakan login sebagai mahasiswa.');
    }

    $krsModel = new KrsModel();
    $mataKuliahModel = new MataKuliahModel();

    // Tentukan tahun ajaran dan semester saat ini
    $tahunSekarang = date('Y') . '/' . (date('Y') + 1);
    $semesterSekarang = 'genap'; // Ubah sesuai data di database jika dinamis

    // Ambil semua KRS mahasiswa
    $krsList = $krsModel->where('mahasiswa_id', $mahasiswaId)
        ->orderBy('tahun_ajaran', 'DESC')
        ->orderBy('semester', 'DESC')
        ->findAll();

    $riwayat = [];
    $krsSekarang = [];

    foreach ($krsList as $krs) {
        $mk = $mataKuliahModel->find($krs['matakuliah_id']);

        if ($mk) {
            $mk['tahun_ajaran'] = $krs['tahun_ajaran'];
            $mk['semester'] = $krs['semester'];
            $mk['is_approved'] = $krs['is_approved'];
            $mk['krs_id'] = $krs['id'];

            $isSaatIni = $krs['tahun_ajaran'] === $tahunSekarang && $krs['semester'] === $semesterSekarang;

            if ($isSaatIni) {
                $krsSekarang[] = $mk;
            } else {
                $key = $krs['tahun_ajaran'] . ' - Semester ' . ucfirst($krs['semester']);
                $riwayat[$key][] = $mk;
            }
        }
    }

    return view('dashboard/mahasiswa', [
        'title' => 'Dashboard Mahasiswa',
        'message' => 'Berikut adalah mata kuliah yang telah Anda pilih:',
        'krsSekarang' => $krsSekarang,
        'riwayat' => $riwayat,
        'tahun_ajaran' => $tahunSekarang,
        'semester' => $semesterSekarang,
    ]);
}





public function dosen()
{
    $dosenId = session()->get('dosen_id');

    if (!$dosenId) {
        return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
    }

    $mkModel    = new \App\Models\MataKuliahModel();
    $krsModel   = new \App\Models\KrsModel();
    $mhsModel   = new \App\Models\MahasiswaModel();

    $mataKuliahList = $mkModel->where('dosen_id', $dosenId)->findAll();

    foreach ($mataKuliahList as &$mk) {
        $krsList = $krsModel->where('matakuliah_id', $mk['id'])->findAll();

        $mahasiswaList = [];

        foreach ($krsList as $krs) {
            $mhs = $mhsModel->find($krs['mahasiswa_id']);
            if ($mhs) {
                $mahasiswaList[] = [
                    'nama' => $mhs['nama'],
                    'nim' => $mhs['nim'],
                    'prodi' => $mhs['prodi'],
                    'krs_id' => $krs['id'],
                    'is_approved' => $krs['is_approved']
                ];
            }
        }

        $mk['mahasiswa'] = $mahasiswaList;
    }

    return view('dashboard/dosen', [
        'matakuliah' => $mataKuliahList
    ]);
}




    public function tambahMatakuliah()
    {
        return view('dashboard/tambah_matakuliah');
    }

    public function simpanMatakuliah()
    {
        $model = new MataKuliahModel();

        $data = [
            'kode'     => $this->request->getPost('kode'),
            'nama'     => $this->request->getPost('nama'),
            'sks'      => $this->request->getPost('sks'),
            'semester' => $this->request->getPost('semester'),
            'kelas'    => $this->request->getPost('kelas'),
            'ruang'    => $this->request->getPost('ruang'),
            'hari'     => $this->request->getPost('hari'),
            'waktu'    => $this->request->getPost('waktu'),
            'dosen_id' => session()->get('id') // Dosen yang menambahkan
        ];

        $model->insert($data);

        return redirect()->to('/dashboard/dosen')->with('success', 'Mata kuliah berhasil ditambahkan.');
    }

    
    
}
