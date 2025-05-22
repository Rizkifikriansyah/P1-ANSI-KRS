<!DOCTYPE html>
<html>
<head>
    <title>Kelola Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
    <h2>Kelola Mahasiswa</h2>
    <a href="/dashboard/admin" class="btn btn-secondary mb-3">Kembali</a>
    <a href="/admin/mahasiswa/tambah" class="btn btn-primary mb-3">+ Tambah Mahasiswa</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIM</th>
                <th>Prodi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mahasiswa as $mhs): ?>
                <tr>
                    <td><?= esc($mhs['nama']) ?></td>
                    <td><?= esc($mhs['nim']) ?></td>
                    <td><?= esc($mhs['prodi']) ?></td>
                    <td>
                        <a href="/admin/mahasiswa/edit/<?= $mhs['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="/admin/mahasiswa/hapus/<?= $mhs['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
