<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'nama', 'nim', 'prodi', 'angkatan'];

    // Jika menggunakan timestamps
    protected $useTimestamps = false;  // Set ke true jika tabel 'mahasiswa' punya kolom created_at dan updated_at
    // protected $createdField = 'created_at';  // Uncomment jika menggunakan timestamps dan nama kolom untuk waktu pembuatan
    // protected $updatedField = 'updated_at';  // Uncomment jika menggunakan timestamps dan nama kolom untuk waktu update
}
