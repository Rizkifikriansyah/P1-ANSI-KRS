<?php

namespace App\Models;

use CodeIgniter\Model;

class KrsModel extends Model
{
    protected $table = 'krs';
    protected $useTimestamps = false;
    protected $allowedFields = ['mata_kuliah', 'kelas', 'dosen', 'hari', 'sks'];
}