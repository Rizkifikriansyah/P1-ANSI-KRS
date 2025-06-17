<?php

namespace App\Models;

use CodeIgniter\Model;

class KrsModel extends Model
{
    protected $table = 'krs';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'mahasiswa_id',
        'matakuliah_id',
        'jadwal_id',           // ✅ tambahkan kolom ini agar bisa disimpan
        'tahun_ajaran',
        'semester',
        'approved_by',
        'approved_at',
        'is_approved'
    ];

    public function approveByIds(array $ids, $dosenId)
    {
        return $this->whereIn('id', $ids)
                    ->set([
                        'is_approved' => 1,
                        'approved_by' => $dosenId,
                        'approved_at' => date('Y-m-d H:i:s'),
                    ])
                    ->update();
    }

    public function getMahasiswaByMatakuliah($matakuliah_id)
    {
        return $this->db->table('krs')
            ->select('krs.id as krs_id, mahasiswa.nama, mahasiswa.nim, mahasiswa.prodi, krs.is_approved')
            ->join('mahasiswa', 'mahasiswa.id = krs.mahasiswa_id')
            ->where('krs.matakuliah_id', $matakuliah_id)
            ->get()->getResultArray();
    }

    // ✅ Tambahan opsional: ambil KRS lengkap beserta jadwal dan matakuliah
    public function getFullKrsByMahasiswa($mahasiswa_id, $tahun_ajaran = null, $semester = null)
    {
        $builder = $this->db->table('krs')
            ->select('krs.*, jadwal.kelas, jadwal.hari, jadwal.waktu, matakuliah.nama as nama_matkul, matakuliah.kode')
            ->join('jadwal', 'jadwal.id = krs.jadwal_id', 'left')
            ->join('matakuliah', 'matakuliah.id = krs.matakuliah_id', 'left')
            ->where('krs.mahasiswa_id', $mahasiswa_id);

        if ($tahun_ajaran) {
            $builder->where('krs.tahun_ajaran', $tahun_ajaran);
        }

        if ($semester) {
            $builder->where('krs.semester', $semester);
        }

        return $builder->get()->getResultArray();
    }
}
