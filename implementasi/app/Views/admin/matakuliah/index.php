<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/style.css?v=1.0.4') ?>">
</head>
<body class="bg-light">
<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">Kelola Mata Kuliah</h2>
        <div>
            <a href="/dashboard/admin" class="btn btn-outline-secondary me-2">← Kembali</a>
            <a href="/admin/matakuliah/tambah" class="btn btn-primary">+ Tambah Mata Kuliah</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-striped align-middle shadow-sm rounded">
            <thead class="table-primary">
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>SKS</th>
                    <th>Semester</th>
                    <th>Kelas</th>
                    <th>Ruang</th>
                    <th>Hari</th>
                    <th>Waktu</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($matakuliah as $mk): ?>
                    <tr>
                        <td><?= esc($mk['kode']) ?></td>
                        <td><?= esc($mk['nama']) ?></td>
                        <td><?= esc($mk['sks']) ?></td>
                        <td><?= esc($mk['semester']) ?></td>
                        <td><?= esc($mk['kelas']) ?></td>
                        <td><?= esc($mk['ruang']) ?></td>
                        <td><?= esc($mk['hari']) ?></td>
                        <td><?= esc($mk['waktu']) ?></td>
                        <td class="text-center">
                            <a href="/admin/matakuliah/edit/<?= $mk['id'] ?>" class="btn btn-warning btn-sm me-1">✏️ Edit</a>
                            <a href="/admin/matakuliah/hapus/<?= $mk['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">🗑️ Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if (empty($matakuliah)): ?>
                    <tr>
                        <td colspan="9" class="text-center text-muted">Belum ada data mata kuliah.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>
</body>
</html>
