<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{
    public function dashboard()
    {
        $model = new MahasiswaModel();
        $data['mahasiswa'] = $model->findAll(); // ambil semua data mahasiswa

        return view('mahasiswa/dashboard', $data); // kirim ke view
    }
}
