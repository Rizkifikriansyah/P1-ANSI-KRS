<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
    protected $table      = 'setting';
    protected $primaryKey = 'id';

    protected $allowedFields = ['tahun_ajaran', 'semester'];
    protected $useTimestamps = true;
    protected $createdField  = false;
    protected $updatedField  = 'updated_at';
}
