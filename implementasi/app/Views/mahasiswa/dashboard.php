<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Dashboard Mahasiswa</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NIM</th><th>Nama</th><th>Prodi</th><th>Angkatan</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($mahasiswa as $m): ?>
            <tr>
                <td><?= $m['nim'] ?></td>
                <td><?= $m['nama'] ?></td>
                <td><?= $m['prodi'] ?></td>
                <td><?= $m['angkatan'] ?></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>
</body>
</html>
