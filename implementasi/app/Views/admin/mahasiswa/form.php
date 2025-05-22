<!DOCTYPE html>
<html>
<head>
    <title><?= isset($mahasiswa) ? 'Edit' : 'Tambah' ?> Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
    <h2><?= isset($mahasiswa) ? 'Edit' : 'Tambah' ?> Mahasiswa</h2>
    
    <form action="<?= isset($mahasiswa) ? '/admin/mahasiswa/update/' . $mahasiswa['id'] : '/admin/mahasiswa/simpan' ?>" method="post">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="<?= isset($mahasiswa) ? esc($mahasiswa['nama']) : '' ?>" required>
        </div>

        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" name="nim" id="nim" class="form-control" value="<?= isset($mahasiswa) ? esc($mahasiswa['nim']) : '' ?>" required>
        </div>

        <div class="mb-3">
            <label for="prodi" class="form-label">Prodi</label>
            <input type="text" name="prodi" id="prodi" class="form-control" value="<?= isset($mahasiswa) ? esc($mahasiswa['prodi']) : '' ?>" required>
        </div>

        <?php if (!isset($mahasiswa)): ?>
        <!-- Form hanya ditampilkan saat tambah -->
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <?php endif; ?>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="/admin/mahasiswa" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>
