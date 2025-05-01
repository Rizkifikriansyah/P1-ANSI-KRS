<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | UMB'
        ];
        return view('pages/home', $data);
    }
    public function krs()
    {
        $data = [
            'title' => 'Kartu Rencana Studi'
        ];
        return view('pages/krs', $data);
    }
    public function laporan()
    {
        $data = [
            'title' => 'Laporan',
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'jln. jati no.19',
                    'kota' => 'Bandung'
                ],
                [
                    'tipe' => 'kantor',
                    'alamat' => 'jln. pisang no.22',
                    'kota' => 'Bandung'
                ]
            ]
        ];
        return view('pages/laporan', $data);
    }
}
