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

$routes->get('/dashboard/admin', 'AdminController::index');

$routes->get('/admin/matakuliah', 'AdminController::kelolaMatakuliah');
$routes->get('/admin/mahasiswa', 'AdminController::kelolaMahasiswa');
$routes->get('/admin/dosen', 'AdminController::kelolaDosen');

// Mahasiswa
$routes->get('/admin/mahasiswa/tambah', 'AdminController::formMahasiswa');
$routes->get('/admin/mahasiswa/form', 'AdminController::formMahasiswa');
$routes->get('/admin/mahasiswa/edit/(:num)', 'AdminController::formMahasiswa/$1');
$routes->post('/admin/mahasiswa/simpan', 'AdminController::simpanMahasiswa');
$routes->post('/admin/mahasiswa/update/(:num)', 'AdminController::updateMahasiswa/$1');
$routes->get('/admin/mahasiswa/hapus/(:num)', 'AdminController::hapusMahasiswa/$1');

// Dosen
$routes->get('/admin/dosen/tambah', 'AdminController::formDosen');
$routes->get('/admin/dosen/form', 'AdminController::formDosen');
$routes->get('/admin/dosen/edit/(:num)', 'AdminController::formDosen/$1');
$routes->post('/admin/dosen/simpan', 'AdminController::simpanDosen');
$routes->post('/admin/dosen/update/(:num)', 'AdminController::updateDosen/$1');
$routes->get('/admin/dosen/hapus/(:num)', 'AdminController::hapusDosen/$1');

// Matakuliah
$routes->get('/admin/matakuliah/tambah', 'AdminController::formMatakuliah');
$routes->get('/admin/matakuliah/form', 'AdminController::formMatakuliah');
$routes->get('/admin/matakuliah/edit/(:num)', 'AdminController::formMatakuliah/$1');
$routes->post('/admin/matakuliah/simpan', 'AdminController::simpanMatakuliah');
$routes->post('/admin/matakuliah/update/(:num)', 'AdminController::updateMatakuliah/$1');
$routes->get('/admin/matakuliah/hapus/(:num)', 'AdminController::hapusMatakuliah/$1');


$routes->post('/admin/simpan-mahasiswa', 'AdminController::simpanMahasiswa');
$routes->post('/admin/simpan-dosen', 'AdminController::simpanDosen');
// Mahasiswa
$routes->get('/dashboard/mahasiswa', 'Dashboard::mahasiswa');

// Dosen
$routes->get('/dashboard/dosen', 'Dashboard::dosen');
$routes->post('/krs/approve', 'Krs::approve');

// CRUD KRS
$routes->get('/krs', 'Krs::index');
$routes->post('/krs/store', 'Krs::store');
$routes->get('/krs/hapus/(:num)', 'Krs::hapus/$1');









