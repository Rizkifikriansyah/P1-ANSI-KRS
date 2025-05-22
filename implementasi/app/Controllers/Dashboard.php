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

        // Ambil semua KRS untuk mahasiswa ini
        $krs = $krsModel->where('mahasiswa_id', $mahasiswaId)->findAll();

        // Ambil data matakuliah dari KRS
        $matakuliahList = [];
        foreach ($krs as $entry) {
            $mk = $mataKuliahModel->find($entry['matakuliah_id']);
            if ($mk) {
                $mk['tahun_ajaran'] = $entry['tahun_ajaran'];
                $mk['semester'] = $entry['semester'];
                $mk['krs_id'] = $entry['id']; // Penting agar tombol hapus bekerja
                $matakuliahList[] = $mk;
            }
        }

        return view('dashboard/mahasiswa', [
            'title' => 'Dashboard Mahasiswa',
            'message' => 'Berikut adalah mata kuliah yang telah Anda pilih:',
            'matakuliah' => $matakuliahList
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

    // Ambil semua matakuliah yang diampu oleh dosen
    $mataKuliahList = $mkModel->where('dosen_id', $dosenId)->findAll();

    foreach ($mataKuliahList as &$mk) {
        // Ambil semua KRS yang terkait dengan matakuliah ini
        $krsList = $krsModel->where('matakuliah_id', $mk['id'])->findAll();

        $mahasiswaList = [];

        foreach ($krsList as $krs) {
            $mhs = $mhsModel->find($krs['mahasiswa_id']);
            if ($mhs) {
                $mahasiswaList[] = [
                    'nama' => $mhs['nama'],
                    'nim'  => $mhs['nim'],
                    'prodi'=> $mhs['prodi']
                ];
            }
        }

        // Tambahkan data mahasiswa ke array matakuliah
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
