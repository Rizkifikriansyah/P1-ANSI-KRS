<?php

namespace App\Controllers;

use App\Models\MataKuliahModel;
use App\Models\MahasiswaModel;
use App\Models\DosenModel;
use App\Models\KrsModel;
use App\Models\UserModel;
use App\Models\JadwalModel;


class AdminController extends BaseController
{
    public function index()
    {
        return view('dashboard/admin');
    }

    // ===== Mata Kuliah =====
    public function kelolaMatakuliah()
    {
        $db = \Config\Database::connect();
        $keyword = $this->request->getGet('q');

        $query = $db->table('matakuliah');

        if ($keyword) {
            $query->like('nama', $keyword)->orLike('kode', $keyword);
        }

        $data['matakuliah'] = $query->get()->getResultArray();
        $data['keyword'] = $keyword;

        return view('admin/matakuliah/index', $data);
    }

    public function formMatakuliah($id = null)
    {
        $mkModel = new MataKuliahModel();
        $dosenModel = new DosenModel();

        $data['matakuliah'] = $id ? $mkModel->find($id) : null;
        $data['daftarDosen'] = $dosenModel->findAll();

        return view('admin/matakuliah/form', $data);
    }

   public function simpanMatakuliah()
{
    $model = new MataKuliahModel();

    $model->save([
        'kode' => $this->request->getPost('kode'),
        'nama' => $this->request->getPost('nama'),
        'sks' => $this->request->getPost('sks'),
        'semester' => $this->request->getPost('semester'),
        'tahun_ajaran' => $this->request->getPost('tahun_ajaran'),
    ]);

    return redirect()->to('/admin/matakuliah')->with('success', 'Mata kuliah berhasil ditambahkan.');
}

public function updateMatakuliah($id)
{
    $mkModel = new MataKuliahModel();

    $data = [
        'kode' => $this->request->getPost('kode'),
        'nama' => $this->request->getPost('nama'),
        'sks' => $this->request->getPost('sks'),
        'semester' => $this->request->getPost('semester'),
        'tahun_ajaran' => $this->request->getPost('tahun_ajaran'),
    ];

    if (!$mkModel->update($id, $data)) {
        return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data.');
    }

    return redirect()->to('/admin/matakuliah')->with('success', 'Data mata kuliah diperbarui.');
}


    public function hapusMatakuliah($id)
    {
        $krsModel = new KrsModel();
        $krsModel->where('matakuliah_id', $id)->delete();

        $mkModel = new MataKuliahModel();
        $mkModel->delete($id);

        return redirect()->to('/admin/matakuliah')->with('success', 'Mata kuliah berhasil dihapus.');
    }

    // ===== Jadwal =====
    public function kelolaJadwal()
    {
        $jadwalModel = new JadwalModel();
        $data['jadwal'] = $jadwalModel->getFullJadwal(); // join matakuliah & dosen
        $data['keyword'] = $this->request->getGet('q');
        return view('admin/jadwal/index', $data);
    }

    public function formJadwal($id = null)
    {
        $jadwalModel = new JadwalModel();
        $matakuliahModel = new MataKuliahModel();
        $dosenModel = new DosenModel();

        $data['jadwal'] = $id ? $jadwalModel->find($id) : null;
        $data['matakuliah'] = $matakuliahModel->findAll();
        $data['dosen'] = $dosenModel->findAll();

        return view('admin/jadwal/form', $data);
    }

    public function simpanJadwal()
    {
        $model = new JadwalModel();

        $data = [
            'matakuliah_id' => $this->request->getPost('matakuliah_id'),
            'dosen_id'      => $this->request->getPost('dosen_id'),
            'kelas'         => $this->request->getPost('kelas'),
            'ruang'         => $this->request->getPost('ruang'),
            'hari'          => $this->request->getPost('hari'),
            'waktu'         => $this->request->getPost('waktu'),
        ];

        // jika ada ID (edit)
        if ($this->request->getPost('id')) {
            $data['id'] = $this->request->getPost('id');
        }

        $model->save($data);

        return redirect()->to('/admin/jadwal')->with('success', 'Jadwal berhasil disimpan.');
    }

    public function updateJadwal($id)
    {
        $model = new JadwalModel();

        $data = [
            'matakuliah_id' => $this->request->getPost('matakuliah_id'),
            'dosen_id'      => $this->request->getPost('dosen_id'),
            'kelas'         => $this->request->getPost('kelas'),
            'ruang'         => $this->request->getPost('ruang'),
            'hari'          => $this->request->getPost('hari'),
            'waktu'         => $this->request->getPost('waktu'),
        ];

        if (!$model->update($id, $data)) {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui jadwal.');
        }

        return redirect()->to('/admin/jadwal')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function hapusJadwal($id)
    {
        $model = new JadwalModel();
        $model->delete($id);

        return redirect()->to('/admin/jadwal')->with('success', 'Jadwal berhasil dihapus.');
    }




// ===== Mahasiswa =====

public function kelolaMahasiswa()
{
    $model = new MahasiswaModel();
    $data['mahasiswa'] = $model->findAll();
    return view('admin/mahasiswa/index', $data);
}

public function formMahasiswa($id = null)
{
    $model = new MahasiswaModel();
    $data['mahasiswa'] = $id ? $model->find($id) : null;

    return view('admin/mahasiswa/form', $data);
}

public function simpanMahasiswa()
{
    $validation = \Config\Services::validation();

    $rules = [
        'nama'      => 'required',
        'nim'       => 'required|is_unique[mahasiswa.nim]',
        'prodi'     => 'required',
        'angkatan'  => 'required|numeric',
        'nomor_hp'  => 'required',
        'alamat'    => 'required',
        'username'  => 'required|is_unique[users.username]',
        'password'  => 'required|min_length[5]',
    ];

    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

    $userModel = new \App\Models\UserModel();
    $mahasiswaModel = new \App\Models\MahasiswaModel();

    // Simpan user
    $userData = [
        'username' => $this->request->getPost('username'),
        'password' => $this->request->getPost('password'), // Akan di-hash oleh callback
        'name'     => $this->request->getPost('nama'),
        'role'     => 'mahasiswa',
    ];

    if (!$userModel->insert($userData)) {
        return redirect()->back()->withInput()->with('error', 'Gagal menyimpan user.');
    }

    $userId = $userModel->getInsertID();

    // Simpan mahasiswa
    $mahasiswaData = [
        'user_id'   => $userId,
        'nama'      => $this->request->getPost('nama'),
        'nim'       => $this->request->getPost('nim'),
        'prodi'     => $this->request->getPost('prodi'),
        'angkatan'  => $this->request->getPost('angkatan'),
        'nomor_hp'  => $this->request->getPost('nomor_hp'),
        'alamat'    => $this->request->getPost('alamat'),
    ];

    if (!$mahasiswaModel->insert($mahasiswaData)) {
        // Rollback: hapus user yang tadi berhasil ditambahkan
        $userModel->delete($userId);
        return redirect()->back()->withInput()->with('errors', $mahasiswaModel->errors());
    }

    return redirect()->to('/admin/mahasiswa')->with('success', 'Mahasiswa berhasil ditambahkan.');
}

public function updateMahasiswa($id)
{
    $mahasiswaModel = new MahasiswaModel();
    $userModel = new UserModel();

    $mahasiswa = $mahasiswaModel->find($id);
    if (!$mahasiswa) {
        return redirect()->back()->with('error', 'Mahasiswa tidak ditemukan.');
    }

    // Validasi update NIM (jika berubah)
    $rules = [
        'nama'      => 'required',
        'nim'       => "required|is_unique[mahasiswa.nim,id,{$id}]",
        'prodi'     => 'required',
        'angkatan'  => 'required|numeric',
        'nomor_hp'  => 'required',
        'alamat'    => 'required',
    ];

    $validation = \Config\Services::validation();

    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

    // Update mahasiswa
    $mahasiswaModel->update($id, [
        'nama'      => $this->request->getPost('nama'),
        'nim'       => $this->request->getPost('nim'),
        'prodi'     => $this->request->getPost('prodi'),
        'angkatan'  => $this->request->getPost('angkatan'),
        'nomor_hp'  => $this->request->getPost('nomor_hp'),
        'alamat'    => $this->request->getPost('alamat'),
    ]);

    // Update nama di tabel users
    $userModel->update($mahasiswa['user_id'], [
        'name' => $this->request->getPost('nama'),
    ]);

    return redirect()->to('/admin/mahasiswa')->with('success', 'Data mahasiswa berhasil diperbarui.');
}

public function hapusMahasiswa($id)
{
    $mahasiswaModel = new MahasiswaModel();
    $userModel = new UserModel();

    $mahasiswa = $mahasiswaModel->find($id);

    if ($mahasiswa) {
        $mahasiswaModel->delete($id);
        $userModel->delete($mahasiswa['user_id']); // FK cascade jika diatur
    }

    return redirect()->to('/admin/mahasiswa')->with('success', 'Mahasiswa berhasil dihapus.');
}



// ===== Dosen =====
public function kelolaDosen()
{
    $model = new \App\Models\DosenModel();
    $keyword = $this->request->getGet('keyword');

    if ($keyword) {
        $model->groupStart()
              ->like('nama', $keyword)
              ->orLike('nidn', $keyword)
              ->orLike('prodi', $keyword)
              ->groupEnd();
    }

    $data['dosen'] = $model->findAll();
    return view('admin/dosen/index', $data);
}


public function formDosen($id = null)
{
    $dosenModel = new DosenModel();
    $data['dosen'] = $id ? $dosenModel->find($id) : null;

    return view('admin/dosen/form', $data);
}

public function simpanDosen()
{
    $validation = \Config\Services::validation();

    $rules = [
        'nama'      => 'required',
        'nidn'      => 'required|is_unique[dosen.nidn]',
        'username'  => 'required|is_unique[users.username]',
        'password'  => 'required|min_length[5]',
        'prodi'     => 'required',
        'fakultas'  => 'required',
        'email'     => 'required|valid_email',
        'nomor_hp'  => 'required',
        'alamat'    => 'required'
    ];

    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

    // Simpan ke tabel users
    $userModel = new \App\Models\UserModel();
    $userModel->save([
        'name'     => $this->request->getPost('nama'),
        'username' => $this->request->getPost('username'),
        'password' => md5($this->request->getPost('password')),
        'role'     => 'dosen'
    ]);

    $user_id = $userModel->getInsertID();

    // Simpan ke tabel dosen
    $dosenModel = new \App\Models\DosenModel();
    $dosenModel->save([
        'user_id'   => $user_id,
        'nama'      => $this->request->getPost('nama'),
        'nidn'      => $this->request->getPost('nidn'),
        'prodi'     => $this->request->getPost('prodi'),
        'fakultas'  => $this->request->getPost('fakultas'),
        'email'     => $this->request->getPost('email'),
        'nomor_hp'  => $this->request->getPost('nomor_hp'),
        'alamat'    => $this->request->getPost('alamat')
    ]);

    return redirect()->to('/admin/dosen')->with('success', 'Dosen berhasil ditambahkan.');
}


public function updateDosen($id)
{
    $dosenModel = new DosenModel();
    $dosen = $dosenModel->find($id);

    if (!$dosen) {
        return redirect()->to('/admin/dosen')->with('error', 'Dosen tidak ditemukan.');
    }

    $data = [
        'nama'      => $this->request->getPost('nama'),
        'nidn'      => $this->request->getPost('nidn'),
        'prodi'     => $this->request->getPost('prodi'),
        'fakultas'  => $this->request->getPost('fakultas'),
        'email'     => $this->request->getPost('email'),
        'nomor_hp'  => $this->request->getPost('nomor_hp'),
        'alamat'    => $this->request->getPost('alamat'),
    ];

    $dosenModel->update($id, $data);

    return redirect()->to('/admin/dosen')->with('success', 'Data dosen berhasil diperbarui.');
}

public function hapusDosen($id)
{
    $dosenModel = new DosenModel();
    $dosenModel->delete($id);

    return redirect()->to('/admin/dosen')->with('success', 'Dosen berhasil dihapus.');
}

}
