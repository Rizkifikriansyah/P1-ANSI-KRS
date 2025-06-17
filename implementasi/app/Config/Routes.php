<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Auth::index');
$routes->post('/auth/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');

$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);
$routes->get('/dashboard/mahasiswa', 'Dashboard::mahasiswa', ['filter' => 'auth']);
$routes->get('/dashboard/dosen', 'Dashboard::dosen', ['filter' => 'auth']);
$routes->get('/dashboard/mahasiswa', 'Mahasiswa::mahasiswa');

$routes->get('/krs', 'Krs::index', ['filter' => 'auth']);   // Menampilkan daftar matakuliah
$routes->post('/krs/store', 'Krs::store', ['filter' => 'auth']); // Memproses penyimpanan KRS
$routes->post('/krs/store', 'KrsController::store');
$routes->get('/krs', 'Krs::index');
$routes->post('/krs/store', 'Krs::store');
$routes->get('/krs/cetak', 'Krs::cetak');
$routes->post('/krs/hapus/(:num)', 'Krs::hapus/$1');


$routes->get('/dashboard/tambah-matakuliah', 'Dashboard::tambahMatakuliah');
$routes->post('/dashboard/simpan-matakuliah', 'Dashboard::simpanMatakuliah');

// Dashboard admin
$routes->get('/dashboard/admin', 'AdminController::index', ['filter' => 'admin']);

$routes->group('admin', ['filter' => 'admin'], function($routes) {

    // =================== JADWAL ===================
    $routes->get('jadwal', 'AdminController::kelolaJadwal');
    $routes->get('jadwal/tambah', 'AdminController::formJadwal'); // bisa juga pakai 'form'
    $routes->get('jadwal/form', 'AdminController::formJadwal');
    $routes->get('jadwal/edit/(:num)', 'AdminController::formJadwal/$1');
    $routes->post('jadwal/simpan', 'AdminController::simpanJadwal');
    $routes->post('jadwal/update/(:num)', 'AdminController::updateJadwal/$1');
    $routes->get('jadwal/hapus/(:num)', 'AdminController::hapusJadwal/$1');

    // =================== MATAKULIAH ===================
    $routes->get('matakuliah', 'AdminController::kelolaMatakuliah');
    $routes->get('matakuliah/tambah', 'AdminController::formMatakuliah');
    $routes->get('matakuliah/form', 'AdminController::formMatakuliah');
    $routes->get('matakuliah/edit/(:num)', 'AdminController::formMatakuliah/$1');
    $routes->post('matakuliah/simpan', 'AdminController::simpanMatakuliah');
    $routes->post('matakuliah/update/(:num)', 'AdminController::updateMatakuliah/$1');
    $routes->get('matakuliah/hapus/(:num)', 'AdminController::hapusMatakuliah/$1');

    // =================== MAHASISWA ===================
    $routes->get('mahasiswa', 'AdminController::kelolaMahasiswa');
    $routes->get('mahasiswa/tambah', 'AdminController::formMahasiswa');
    $routes->get('mahasiswa/form', 'AdminController::formMahasiswa');
    $routes->get('mahasiswa/edit/(:num)', 'AdminController::formMahasiswa/$1');
    $routes->post('mahasiswa/simpan', 'AdminController::simpanMahasiswa');
    $routes->post('mahasiswa/update/(:num)', 'AdminController::updateMahasiswa/$1');
    $routes->get('mahasiswa/hapus/(:num)', 'AdminController::hapusMahasiswa/$1');

    // =================== DOSEN ===================
    $routes->get('dosen', 'AdminController::kelolaDosen');
    $routes->get('dosen/tambah', 'AdminController::formDosen');
    $routes->get('dosen/form', 'AdminController::formDosen');
    $routes->get('dosen/edit/(:num)', 'AdminController::formDosen/$1');
    $routes->post('dosen/simpan', 'AdminController::simpanDosen');
    $routes->post('dosen/update/(:num)', 'AdminController::updateDosen/$1');
    $routes->get('dosen/hapus/(:num)', 'AdminController::hapusDosen/$1');

});


// Mahasiswa
$routes->get('/dashboard/mahasiswa', 'Dashboard::mahasiswa');

// Dosen
$routes->get('/dashboard/dosen', 'Dashboard::dosen');
$routes->post('/krs/approve', 'Krs::approve');

// CRUD KRS
$routes->get('/krs', 'Krs::index');
$routes->post('/krs/store', 'Krs::store');
$routes->get('/krs/hapus/(:num)', 'Krs::hapus/$1');









