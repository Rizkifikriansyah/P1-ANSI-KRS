<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table      = 'mahasiswa';         // Nama tabel di database
    protected $primaryKey = 'id';                // Primary key tabel

    // Kolom-kolom yang bisa diisi melalui input/form
    protected $allowedFields = [
        'nama',
        'nim',
        'prodi',
        'angkatan',
        'nomor_hp',
        'alamat',
        'user_id'
    ];

protected $useTimestamps = true;
protected $createdField  = 'created_at';
protected $updatedField  = 'updated_at';

}
