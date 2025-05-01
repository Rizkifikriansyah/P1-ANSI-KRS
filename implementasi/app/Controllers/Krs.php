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

        return view ('krs/index',$data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Data Kartu Rencana Studi'
        ];

        return view('krs/create', $data);
    }

    public function save()
    {
        $this->krsModel->save([
            'mata_kuliah' => $this->request->getVar('mata_kuliah'),
            'kelas' => $this->request->getVar('kelas'),
            'dosen' => $this->request->getVar('dosen'),
            'hari' => $this->request->getVar('hari'),
            'sks' => $this->request->getVar('sks')
        ]);

        return redirect()->to('/krs');

    }

}