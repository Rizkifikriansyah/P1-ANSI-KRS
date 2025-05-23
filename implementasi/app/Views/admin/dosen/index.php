<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/style.css?v=1.0.3') ?>">
</head>
<body class="bg-light">
<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">Kelola Dosen</h2>
        <div>
            <a href="/dashboard/admin" class="btn btn-outline-secondary me-2">← Kembali</a>
            <a href="/admin/dosen/tambah" class="btn btn-primary">+ Tambah Dosen</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-striped align-middle shadow-sm rounded">
            <thead class="table-primary">
                <tr>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Prodi</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dosen as $dsn): ?>
                    <tr>
                        <td><?= esc($dsn['nama']) ?></td>
                        <td><?= esc($dsn['nip']) ?></td>
                        <td><?= esc($dsn['prodi']) ?></td>
                        <td class="text-center">
                            <a href="/admin/dosen/edit/<?= $dsn['id'] ?>" class="btn btn-sm btn-warning me-1">
                                ✏️ Edit
                            </a>
                            <a href="/admin/dosen/hapus/<?= $dsn['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus dosen ini?')">
                                🗑️ Hapus
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if (empty($dosen)): ?>
                    <tr>
                        <td colspan="4" class="text-center text-muted">Belum ada data dosen.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>
</body>
</html>
