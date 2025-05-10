<?php

namespace App\Controllers;

use \App\Models\KrsModel;

class Krs extends BaseController
{
    protected $krsModel;

    public function __construct()
    {
        $this->krsModel = new KrsModel();
    }

    public function index()
    {
        $krs = $this->krsModel->findAll();

        $data = [
            'title' => 'Daftar Mata Kuliah',
            'krs' => $krs
        ];

        return view('krs/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Data Kartu Rencana Studi',
            'validation' => \Config\Services::validation()
        ];

        return view('krs/create', $data);
    }

    public function save()
    {
        // validasi input
        if (!$this->validate([
            'mata_kuliah' => 'required|is_unique[krs.mata_kuliah]'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/krs/create')->withInput()->with('validation', $validation);
        }

        $this->krsModel->save([
            'mata_kuliah' => $this->request->getVar('mata_kuliah'),
            'kelas' => $this->request->getVar('kelas'),
            'dosen' => $this->request->getVar('dosen'),
            'hari' => $this->request->getVar('hari'),
            'sks' => $this->request->getVar('sks')
        ]);

        session()->setFlashdata('pesan', 'Mata Kuliah Berhasil di Tambahkan.');

        return redirect()->to('/krs');
    }

    public function delete($id)
    {
        $this->krsModel->delete($id);

        session()->setFlashdata('pesan', 'Data berhasil dihapus.');

        return redirect()->to('/krs');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Mata Kuliah', // ✅ ini sudah benar sekarang
            'validation' => \Config\Services::validation(),
            'krs' => $this->krsModel->find($id)
        ];

        return view('krs/edit', $data);
    }

    public function update($id)
    {
        // validasi input saat update
        if (!$this->validate([
            'mata_kuliah' => 'required'
        ])) {
            return redirect()->to('/krs/edit/' . $id)->withInput();
        }

        $this->krsModel->save([
            'id' => $id,
            'mata_kuliah' => $this->request->getVar('mata_kuliah'),
            'kelas' => $this->request->getVar('kelas'),
            'dosen' => $this->request->getVar('dosen'),
            'hari' => $this->request->getVar('hari'),
            'sks' => $this->request->getVar('sks')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/krs');
    }
}
