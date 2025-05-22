<?php

namespace App\Models;

use CodeIgniter\Model;

class DosenModel extends Model
{
    protected $table      = 'dosen';          // Nama tabel di database
    protected $primaryKey = 'id';             // Primary key tabel

    protected $allowedFields = ['nama', 'nip', 'prodi', 'user_id']; // Kolom yang bisa diisi

    // Jika kamu menggunakan kolom created_at dan updated_at di tabel dosen, ubah ini ke true
    protected $useTimestamps = false;

    // Jika kamu menggunakan soft deletes
    protected $useSoftDeletes = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
