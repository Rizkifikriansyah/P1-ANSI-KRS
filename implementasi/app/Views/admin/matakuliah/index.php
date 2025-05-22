<!DOCTYPE html>
<html>
<head>
    <title>Kelola Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
    <h2>Kelola Mata Kuliah</h2>
    <a href="/dashboard/admin" class="btn btn-secondary mb-3">Kembali</a>
    <a href="/admin/matakuliah/tambah" class="btn btn-primary mb-3">+ Tambah Mata Kuliah</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>SKS</th>
                <th>Semester</th>
                <th>Kelas</th>
                <th>Ruang</th>
                <th>Hari</th>
                <th>Waktu</th>
                <th>Aksi</th>
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
                    <td>
                        <a href="/admin/matakuliah/edit/<?= $mk['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/admin/matakuliah/hapus/<?= $mk['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
