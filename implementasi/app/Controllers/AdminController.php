<?php

namespace App\Controllers;

use App\Models\MataKuliahModel;
use App\Models\MahasiswaModel;
use App\Models\DosenModel;
use App\Models\KrsModel;
use App\Models\UserModel;

class AdminController extends BaseController
{
    public function index()
    {
        return view('dashboard/admin');
    }
public function kelolaMatakuliah()
{
    $db = \Config\Database::connect(); // Tambahkan koneksi DB
    $keyword = $this->request->getGet('q');

    $query = $db->table('matakuliah');

    if ($keyword) {
        $query->like('nama', $keyword)->orLike('kode', $keyword);
    }

    $data['matakuliah'] = $query->get()->getResultArray();
    $data['keyword'] = $keyword; // Untuk tetap menampilkan keyword di form

    return view('admin/matakuliah/index', $data);
}


    public function kelolaMahasiswa()
    {
        $model = new MahasiswaModel();
        $data['mahasiswa'] = $model->findAll(); // pastikan kolom 'prodi' ada
        return view('admin/mahasiswa/index', $data);

    }

    public function kelolaDosen()
    {
        $model = new DosenModel();
        $data['dosen'] = $model->findAll();
        return view('admin/dosen/index', $data);
    }
    public function formDosen($id = null)
{
    $dosenModel = new \App\Models\DosenModel();

    // Jika $id ada, berarti edit
    $data['dosen'] = $id ? $dosenModel->find($id) : null;

    return view('admin/dosen/form', $data);
}

public function simpanDosen()
{
    $userModel = new \App\Models\UserModel();
    $dosenModel = new \App\Models\DosenModel();

    $userModel->save([
        'name' => $this->request->getPost('nama'),
        'username' => $this->request->getPost('username'),
        'password' => md5($this->request->getPost('password')),
        'role' => 'dosen'
    ]);

    $user_id = $userModel->getInsertID();

    $dosenModel->save([
        'user_id' => $user_id,
        'nama' => $this->request->getPost('nama'),
        'nip' => $this->request->getPost('nip'),
        'prodi' => $this->request->getPost('prodi')
    ]);
    return redirect()->to('/admin/dosen');
}

public function updateDosen($id)
{
    $dosenModel = new \App\Models\DosenModel();

    // Validasi input (opsional, tapi disarankan)
    $data = [
        'nama' => $this->request->getPost('nama'),
        'nip' => $this->request->getPost('nip'),
        'prodi' => $this->request->getPost('prodi'),
    ];

    // Update data dosen
    if ($dosenModel->update($id, $data)) {
        return redirect()->to('/admin/dosen')->with('success', 'Data dosen berhasil diperbarui.');
    } else {
        return redirect()->back()->with('error', 'Gagal memperbarui data dosen.');
    }
}


public function hapusDosen($id)
{
    $dosenModel = new \App\Models\DosenModel();
    $dosenModel->delete($id);

    return redirect()->to('/admin/dosen');
}
// ===== MAHASISWA =====
public function formMahasiswa($id = null)
{
    $model = new \App\Models\MahasiswaModel();
    $data['mahasiswa'] = $id ? $model->find($id) : null;

    return view('admin/mahasiswa/form', $data);
}

public function simpanMahasiswa()
{
    $mahasiswaModel = new \App\Models\MahasiswaModel();
    $userModel = new \App\Models\UserModel();

    $nama     = $this->request->getPost('nama');
    $nim      = $this->request->getPost('nim');
    $prodi    = $this->request->getPost('prodi');
    $username = $this->request->getPost('username');
    $password = md5($this->request->getPost('password'));

    // Simpan ke tabel users
    $userModel->save([
        'username' => $username,
        'password' => $password,
        'name'     => $nama,
        'role'     => 'mahasiswa',
    ]);

    $userId = $userModel->getInsertID();

    // Simpan ke tabel mahasiswa
    $mahasiswaModel->save([
        'user_id' => $userId,
        'nama'    => $nama,
        'nim'     => $nim,
        'prodi'   => $prodi,
    ]);

    return redirect()->to('/admin/mahasiswa')->with('success', 'Mahasiswa berhasil ditambahkan.');
}

public function updateMahasiswa($id)
{
    $mahasiswaModel = new \App\Models\MahasiswaModel();
    $userModel      = new \App\Models\UserModel();

    $nama  = $this->request->getPost('nama');
    $nim   = $this->request->getPost('nim');
    $prodi = $this->request->getPost('prodi');

    // Ambil data mahasiswa yang akan diperbarui
    $mahasiswa = $mahasiswaModel->find($id);
    if (!$mahasiswa) {
        return redirect()->back()->with('error', 'Mahasiswa tidak ditemukan.');
    }

    // Update data mahasiswa
    $mahasiswaModel->update($id, [
        'nama'  => $nama,
        'nim'   => $nim,
        'prodi' => $prodi,
    ]);

    // Update juga nama user (jika ingin disinkronkan)
    $userModel->update($mahasiswa['user_id'], [
        'name' => $nama,
    ]);

    return redirect()->to('/admin/mahasiswa')->with('success', 'Data mahasiswa diperbarui.');
}

public function hapusMahasiswa($id)
{
    $model = new \App\Models\MahasiswaModel();
    $model->delete($id);

    return redirect()->to('/admin/mahasiswa');
}

// ===== MATAKULIAH =====
  public function formMatakuliah($id = null)
    {
        $mkModel     = new MataKuliahModel();
        $dosenModel  = new DosenModel();

        $data['matakuliah']  = $id ? $mkModel->find($id) : null;
        $data['daftarDosen'] = $dosenModel->findAll();      // untuk dropdown dosen

        return view('admin/matakuliah/form', $data);
    }

/* ---------- SIMPAN BARU ---------- */
public function simpanMatakuliah()
{
    $model = new \App\Models\MataKuliahModel();

    $model->save([
        'kode'         => $this->request->getPost('kode'),
        'nama'         => $this->request->getPost('nama'),
        'sks'          => $this->request->getPost('sks'),
        'semester'     => $this->request->getPost('semester'),
        'kelas'        => $this->request->getPost('kelas'),
        'ruang'        => $this->request->getPost('ruang'),
        'hari'         => $this->request->getPost('hari'),
        'waktu'        => $this->request->getPost('waktu'),
        'dosen_id'     => $this->request->getPost('dosen_id'),
        'tahun_ajaran' => $this->request->getPost('tahun_ajaran'), // Tambahan
    ]);

    return redirect()->to('/admin/matakuliah')->with('success', 'Mata kuliah berhasil ditambahkan.');
}

/* ---------- UPDATE ---------- */
public function updateMatakuliah($id)
{
    $mkModel = new MataKuliahModel();

    $data = [
        'kode'         => $this->request->getPost('kode'),
        'nama'         => $this->request->getPost('nama'),
        'sks'          => $this->request->getPost('sks'),
        'semester'     => $this->request->getPost('semester'),
        'kelas'        => $this->request->getPost('kelas'),
        'ruang'        => $this->request->getPost('ruang'),
        'hari'         => $this->request->getPost('hari'),
        'waktu'        => $this->request->getPost('waktu'),
        'dosen_id'     => $this->request->getPost('dosen_id') ?: session()->get('id'),
        'tahun_ajaran' => $this->request->getPost('tahun_ajaran'), // Tambahan
    ];

    if (!$mkModel->update($id, $data)) {
        return redirect()->back()
            ->withInput()
            ->with('error', 'Gagal memperbarui data.');
    }

    $redirect = session()->get('role') === 'dosen' ? '/dashboard/dosen' : '/admin/matakuliah';
    return redirect()->to($redirect)->with('success', 'Data mata kuliah diperbarui.');
}


    /* ---------- HAPUS ---------- */
    public function hapusMatakuliah($id)
    {
        // Hapus KRS terkait
        $krsModel = new KrsModel();
        $krsModel->where('matakuliah_id', $id)->delete();

        // Hapus matakuliah
        $mkModel = new MataKuliahModel();
        $mkModel->delete($id);

        return redirect()->to('/admin/matakuliah')->with('success', 'Mata kuliah berhasil dihapus.');
    }

}
