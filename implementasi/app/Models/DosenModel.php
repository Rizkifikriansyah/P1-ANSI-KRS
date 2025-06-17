<?php

namespace App\Models;

use CodeIgniter\Model;

class DosenModel extends Model
{
    protected $table      = 'dosen';          // Nama tabel di database
    protected $primaryKey = 'id';             // Primary key tabel

    // Kolom-kolom yang dapat diisi melalui form/input
    protected $allowedFields = [
        'nama',
        'nidn',
        'prodi',
        'fakultas',
        'email',
        'nomor_hp',
        'alamat',
        'user_id'
    ];

    protected $useTimestamps = false;         // Aktifkan jika ada created_at & updated_at
    protected $useSoftDeletes = false;        // Aktifkan jika menggunakan soft delete
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
