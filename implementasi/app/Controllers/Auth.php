<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\MahasiswaModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function index()
    {
        return view('auth/login');
    }

    public function login()
{
    $session = session();
    $userModel = new UserModel();
    $dosenModel = new \App\Models\DosenModel();

    $username = $this->request->getPost('username');
    $password = md5($this->request->getPost('password'));

    $user = $userModel->where('username', $username)->first();

    if ($user && $user['password'] === $password) {
        $sessionData = [
            'user_id'   => $user['id'],
            'name'      => $user['name'],
            'role'      => $user['role'],
            'logged_in' => true
        ];

        if ($user['role'] === 'dosen') {
            $dosen = $dosenModel->where('user_id', $user['id'])->first();

            if ($dosen) {
                $sessionData['dosen_id'] = $dosen['id'];
            } else {
                return redirect()->back()->with('error', 'Dosen tidak ditemukan.');
            }

            $session->set($sessionData);
            return redirect()->to('/dashboard/dosen');
        }

        // mahasiswa
        if ($user['role'] === 'mahasiswa') {
            $mahasiswaModel = new MahasiswaModel();
            $mahasiswa = $mahasiswaModel->where('user_id', $user['id'])->first();
            if ($mahasiswa) {
                $sessionData['mahasiswa_id'] = $mahasiswa['id'];
            }
            $session->set($sessionData);
            return redirect()->to('/dashboard/mahasiswa');
        }

        // admin
        if ($user['role'] === 'admin') {
            $session->set($sessionData);
            return redirect()->to('/dashboard/admin');
        }

        return redirect()->to('/login')->with('error', 'Role tidak dikenali.');
    }

    return redirect()->back()->with('error', 'Username atau password salah.');
}


    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
