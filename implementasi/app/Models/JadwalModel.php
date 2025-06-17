<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'id';
    protected $allowedFields = ['matakuliah_id', 'dosen_id', 'kelas', 'ruang', 'hari', 'waktu'];

    public function getFullJadwal()
    {
        return $this->select('jadwal.*, matakuliah.nama as nama_matakuliah, dosen.nama as nama_dosen')
                    ->join('matakuliah', 'matakuliah.id = jadwal.matakuliah_id')
                    ->join('dosen', 'dosen.id = jadwal.dosen_id')
                    ->findAll();
    }
}
