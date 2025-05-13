<?php
namespace App\Controllers;

use App\Models\UserModel;
use App\Models\MahasiswaModel;
use App\Models\DosenModel;
use CodeIgniter\Controller;

class Supervisor extends Controller
{
    public function index()
    {
        return view('pages/supervisor');
    }

    public function tambah_mahasiswa()
    {
        $userModel = new UserModel();
        $mahasiswaModel = new MahasiswaModel();

        // Ambil data dari form
        $dataUser = [
            'username' => $this->request->getPost('username_mahasiswa'),
            'password' => password_hash($this->request->getPost('password_mahasiswa'), PASSWORD_DEFAULT),
            'role' => 'mahasiswa'
        ];

        // Simpan user
        $userModel->save($dataUser);

        // Ambil ID user yang baru saja ditambahkan
        $userId = $userModel->getInsertID();

        // Simpan mahasiswa
        $dataMahasiswa = [
            'user_id' => $userId,
            'nama' => $this->request->getPost('nama_mahasiswa'),
            'nim' => $this->request->getPost('nim_mahasiswa'),
            'prodi' => $this->request->getPost('prodi_mahasiswa'),
            'angkatan' => $this->request->getPost('angkatan_mahasiswa')
        ];

        $mahasiswaModel->save($dataMahasiswa);

        return redirect()->to('/supervisor')->with('message', 'Mahasiswa berhasil ditambahkan.');
    }

    public function tambah_dosen()
    {
        $userModel = new UserModel();
        $dosenModel = new DosenModel();

        // Ambil data dari form
        $dataUser = [
            'username' => $this->request->getPost('username_dosen'),
            'password' => password_hash($this->request->getPost('password_dosen'), PASSWORD_DEFAULT),
            'role' => 'dosen'
        ];

        // Simpan user
        $userModel->save($dataUser);

        // Ambil ID user yang baru saja ditambahkan
        $userId = $userModel->getInsertID();

        // Simpan dosen
        $dataDosen = [
            'user_id' => $userId,
            'nama' => $this->request->getPost('nama_dosen'),
            'nip' => $this->request->getPost('nip_dosen'),
            'jurusan' => $this->request->getPost('jurusan_dosen')
        ];

        $dosenModel->save($dataDosen);

        return redirect()->to('/supervisor')->with('message', 'Dosen berhasil ditambahkan.');
    }
}
