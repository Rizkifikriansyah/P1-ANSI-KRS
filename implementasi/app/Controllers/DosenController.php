<?php

namespace App\Controllers;

use App\Models\KrsModel;
use CodeIgniter\Controller;
use Config\Database;

class DosenController extends Controller
{
    public function dashboard()
    {
        $dosen_id = session()->get('id'); // ID dosen tersimpan di sesi

        if (!$dosen_id) {
            return redirect()->to('/login')->with('error', 'Silakan login sebagai dosen.');
        }

        $db = Database::connect();

        // Ambil semua jadwal mengajar dosen ini
        $builder = $db->table('jadwal');
        $builder->select('jadwal.*, matakuliah.nama AS nama_matakuliah, matakuliah.kode');
        $builder->join('matakuliah', 'matakuliah.id = jadwal.matakuliah_id');
        $builder->where('jadwal.dosen_id', $dosen_id);
        $jadwalList = $builder->get()->getResultArray();

        $krsModel = new KrsModel();

        // Ambil mahasiswa per jadwal
        foreach ($jadwalList as &$jadwal) {
            $jadwal['mahasiswa'] = $krsModel
                ->select('krs.*, mahasiswa.nama AS nama_mahasiswa, mahasiswa.nim')
                ->join('mahasiswa', 'mahasiswa.id = krs.mahasiswa_id')
                ->where('jadwal_id', $jadwal['id'])
                ->findAll();

            foreach ($jadwal['mahasiswa'] as &$mhs) {
                $mhs['status'] = $mhs['is_approved'] ? 'disetujui' : 'belum disetujui';
            }
        }

        return view('pages/dosen_dashboard', [
            'jadwalList' => $jadwalList
        ]);
    }

    public function approve()
    {
        $jadwalId = $this->request->getPost('jadwal_id');

        if ($jadwalId) {
            $krsModel = new KrsModel();

            $updated = $krsModel->where('jadwal_id', $jadwalId)
                                ->update(null, ['is_approved' => 1]);

            if ($updated) {
                return redirect()->back()->with('message', 'Semua mahasiswa berhasil disetujui.');
            } else {
                return redirect()->back()->with('error', 'Gagal menyetujui mahasiswa.');
            }
        }

        return redirect()->back()->with('error', 'Jadwal tidak ditemukan.');
    }
}
