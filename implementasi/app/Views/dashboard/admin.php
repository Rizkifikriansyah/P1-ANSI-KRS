<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Sistem KRS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarAdmin" aria-controls="navbarAdmin" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarAdmin">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/admin/matakuliah">Kelola Mata Kuliah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/mahasiswa">Kelola Mahasiswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/dosen">Kelola Dosen</a>
                </li>
            </ul>
            <span class="navbar-text text-white me-3">
                <?= session()->get('name') ?> (Admin)
            </span>
            <a href="/logout" class="btn btn-outline-light btn-sm">Logout</a>
        </div>
    </div>
</nav>

<div class="container">
    <h2>Selamat datang di Dashboard Admin</h2>
    <p>Gunakan menu di atas untuk mengelola data akademik.</p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
