<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/style.css?v=1.0.8') ?>">

</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand ms-4" href="#">Universitas Muhammadiyah Bima | Ilmu Komputer</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/krs') ?>">Isi KRS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/krs/cetak') ?>">Cetak KRS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-warning" href="<?= base_url('/logout') ?>">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Content -->
<div class="container mt-5">
    <div class="alert alert-success">
        <h4>Halo, <?= esc(session()->get('name')) ?> (Mahasiswa)</h4>
    </div>
    <h2><?= $title ?? 'Dashboard Mahasiswa' ?></h2>
    <p><?= $message ?? 'Selamat datang di sistem KRS mahasiswa.' ?></p>
    <a href="<?= base_url('/krs') ?>" class="btn btn-primary">Mulai Isi KRS</a>
    <?php if (!empty($matakuliah)): ?>
    <table class="table table-striped mt-4">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Nama Mata Kuliah</th>
            <th>SKS</th>
            <th>Semester</th>
            <th>Tahun Ajaran</th>
            <th>Aksi</th> <!-- Tambahan -->
        </tr>
    </thead>
    <tbody>
        <?php foreach ($matakuliah as $mk): ?>
            <tr>
                <td><?= esc($mk['kode']) ?></td>
                <td><?= esc($mk['nama']) ?></td>
                <td><?= esc($mk['sks']) ?></td>
                <td><?= esc($mk['semester']) ?></td>
                <td><?= esc($mk['tahun_ajaran']) ?></td>
                <td>
                    <form action="<?= base_url('/krs/hapus/' . $mk['krs_id']) ?>" method="post" onsubmit="return confirm('Yakin ingin menghapus mata kuliah ini dari KRS?');">
    <?= csrf_field() ?>
    <button type="submit" class="btn btn-danger btn-sm">🗑️ Hapus</button>
</form>

                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php else: ?>
    <div class="alert alert-warning mt-4">
        Anda belum mengisi KRS.
    </div>
<?php endif; ?>

</div>

<!-- Bootstrap JS (Optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
