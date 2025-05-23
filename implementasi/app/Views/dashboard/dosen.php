<!-- views/dosen/dashboard.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Universitas Muhammadiyah Bima </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <span class="nav-link text-white"><?= esc(session()->get('name')) ?> (Dosen)</span>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('/logout') ?>" class="nav-link text-white">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <h3 class="mb-3">Selamat Datang, <?= esc(session()->get('name')) ?></h3>
    <p class="mb-4">Berikut adalah daftar mata kuliah yang Anda ampu, beserta mahasiswa yang mengambilnya.</p>

   <?php if (!empty($matakuliah)): ?>
    <?php foreach ($matakuliah as $mk): ?>
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-secondary text-white">
                <strong><?= esc($mk['nama']) ?></strong> (<?= esc($mk['kode']) ?>) - Semester: <?= esc($mk['semester']) ?> <br>
                Kelas: <?= esc($mk['kelas']) ?> | Ruang: <?= esc($mk['ruang']) ?> <br>
                Hari: <?= esc($mk['hari']) ?> | Jam: <?= esc($mk['waktu']) ?>
            </div>

                <div class="card-body p-0">
                    <table class="table table-bordered mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 5%;">No</th>
                                <th>Nama Mahasiswa</th>
                                <th>NIM</th>
                                <th>Prodi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($mk['mahasiswa'])): ?>
                                <?php foreach ($mk['mahasiswa'] as $i => $mhs): ?>
                                    <tr>
                                        <td><?= $i + 1 ?></td>
                                        <td><?= esc($mhs['nama']) ?></td>
                                        <td><?= esc($mhs['nim']) ?></td>
                                        <td><?= esc($mhs['prodi']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center text-muted">Belum ada mahasiswa yang mengambil mata kuliah ini.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="alert alert-info">Belum ada mata kuliah yang Anda ampu.</div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
