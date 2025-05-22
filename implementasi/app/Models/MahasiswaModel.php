<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table      = 'mahasiswa';         // Nama tabel di database
    protected $primaryKey = 'id';                // Primary key tabel

    protected $allowedFields = ['nama', 'nim', 'prodi', 'user_id']; // Kolom yang bisa diisi

    protected $useTimestamps = false;            // Ubah ke true jika pakai created_at & updated_at
    protected $useSoftDeletes = false;           // Ubah ke true jika pakai soft delete
}
