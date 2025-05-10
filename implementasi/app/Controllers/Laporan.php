<?php

namespace App\Controllers;

use App\Models\KrsModel;
use Dompdf\Dompdf;

class Laporan extends BaseController
{
    protected $krsModel;
    public function __construct()
    {
        $this->krsModel = new KrsModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Laporan KRS',
            'krs' => $this->krsModel->findAll()
        ];

        return view('laporan/index', $data);
    }

    public function cetak()
    {
        $data = [
            'krs' => $this->krsModel->findAll()
        ];

        // Load view cetak
        $html = view('laporan/cetak', $data);

        // Init Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // Setting ukuran kertas
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF
        $dompdf->render();

        // Download
        $dompdf->stream('laporan-krs.pdf');
    }
}
