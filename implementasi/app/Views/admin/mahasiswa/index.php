<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/style.css?v=1.0.2') ?>">
</head>
<body class="bg-light">
<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">Kelola Mahasiswa</h2>
        <div>
            <a href="/dashboard/admin" class="btn btn-outline-secondary me-2">← Kembali</a>
            <a href="/admin/mahasiswa/tambah" class="btn btn-primary">+ Tambah Mahasiswa</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle shadow-sm rounded">
            <thead class="table-primary">
                <tr>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Prodi</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mahasiswa as $mhs): ?>
                    <tr>
                        <td><?= esc($mhs['nama']) ?></td>
                        <td><?= esc($mhs['nim']) ?></td>
                        <td><?= esc($mhs['prodi']) ?></td>
                        <td class="text-center">
                            <a href="/admin/mahasiswa/edit/<?= $mhs['id'] ?>" class="btn btn-sm btn-warning me-1">
                                ✏️ Edit
                            </a>
                            <a href="/admin/mahasiswa/hapus/<?= $mhs['id'] ?>" 
                               class="btn btn-sm btn-danger" 
                               onclick="return confirm('Yakin ingin menghapus mahasiswa ini?')">
                                🗑️ Hapus
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if (empty($mahasiswa)): ?>
                    <tr>
                        <td colspan="4" class="text-center text-muted">Tidak ada data mahasiswa.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>
</body>
</html>
