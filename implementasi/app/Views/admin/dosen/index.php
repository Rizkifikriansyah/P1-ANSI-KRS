<!DOCTYPE html>
<html>
<head>
    <title>Kelola Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
    <h2>Kelola Dosen</h2>

    <div class="d-flex justify-content-between mb-3">
        <a href="/dashboard/admin" class="btn btn-secondary">Kembali</a>
        <a href="/admin/dosen/tambah" class="btn btn-primary">+ Tambah Dosen</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIP</th>
                <th>Prodi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dosen as $dsn): ?>
                <tr>
                    <td><?= esc($dsn['nama']) ?></td>
                    <td><?= esc($dsn['nip']) ?></td>
                    <td><?= esc($dsn['prodi']) ?></td>
                    <td>
                        <a href="/admin/dosen/edit/<?= $dsn['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="/admin/dosen/hapus/<?= $dsn['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
