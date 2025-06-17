<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = ['username', 'password', 'name', 'role'];

    // Timestamps
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Soft Delete (nonaktif)
    protected $useSoftDeletes = false;

    // Validation rules hanya untuk kolom di tabel `users`
    protected $validationRules = [
        'username' => 'required|min_length[4]|is_unique[users.username]',
        'password' => 'required|min_length[5]',
        'name'     => 'required',
        'role'     => 'required|in_list[admin,dosen,mahasiswa]'
    ];

    protected $validationMessages = [
        'username' => [
            'required'   => 'Username wajib diisi.',
            'min_length' => 'Username minimal 4 karakter.',
            'is_unique'  => 'Username sudah digunakan.'
        ],
        'password' => [
            'required'   => 'Password wajib diisi.',
            'min_length' => 'Password minimal 5 karakter.'
        ],
        'name' => [
            'required' => 'Nama wajib diisi.'
        ],
        'role' => [
            'required' => 'Peran wajib dipilih.',
            'in_list'  => 'Peran tidak valid.'
        ]
    ];

    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Otomatis hash password sebelum insert/update
    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (!isset($data['data']['password'])) {
            return $data;
        }

        // Hanya hash jika belum dihash
        if (!preg_match('/^[a-f0-9]{32}$/', $data['data']['password'])) {
            $data['data']['password'] = md5($data['data']['password']);
        }

        return $data;
    }
}
