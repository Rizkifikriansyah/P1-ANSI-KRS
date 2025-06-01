<?php

namespace App\Controllers;

use App\Models\MataKuliahModel;
use App\Models\KrsModel;
use CodeIgniter\Controller;

class DosenController extends Controller
{
public function dashboard()
{
    $dosen_id = session()->get('id'); // Pastikan ID dosen tersimpan di sesi

    $matakuliahModel = new \App\Models\MataKuliahModel();
    $krsModel = new \App\Models\KrsModel();

    // Ambil semua mata kuliah milik dosen ini
    $matakuliahList = $matakuliahModel->getMatakuliahByDosen($dosen_id);

    // Loop setiap mata kuliah untuk ambil daftar mahasiswa-nya
    foreach ($matakuliahList as &$mk) {
        $mk['mahasiswa'] = $krsModel->getMahasiswaByMatakuliah($mk['id']);

        // Beri field status agar tidak error saat dirender
        foreach ($mk['mahasiswa'] as &$mhs) {
            $mhs['status'] = $mhs['is_approved'] ? 'disetujui' : 'belum';
        }
    }
    return view('pages/dosen_dashboard', [
        'matakuliah' => $matakuliahList
    ]);
}
public function approve()
{
    $matkulId = $this->request->getPost('matakuliah_id');

    if ($matkulId) {
        $krsModel = new \App\Models\KrsModel();

        // Pastikan WHERE jalan sebelum update
        $updated = $krsModel->where('matakuliah_id', $matkulId)
                            ->update(null, ['is_approved' => 1]);
        if ($updated) {
            return redirect()->back()->with('message', 'Semua mahasiswa berhasil disetujui.');
        } else {
            return redirect()->back()->with('error', 'Update gagal dilakukan.');
        }
    }
    return redirect()->back()->with('error', 'Mata kuliah tidak ditemukan.');
}


}
