<?php

namespace App\Models;

use CodeIgniter\Model;

class DosenModel extends Model
{
    protected $table = 'dosen';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'nama', 'nip', 'jurusan'];
    protected $useTimestamps = false; // Jika tidak menggunakan timestamps
}
