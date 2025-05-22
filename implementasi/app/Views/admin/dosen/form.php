<!DOCTYPE html>
<html>
<head>
    <title><?= isset($mahasiswa) ? 'Edit' : 'Tambah' ?> Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
    <h2><?= isset($mahasiswa) ? 'Edit' : 'Tambah' ?> Mahasiswa</h2>
    <form action="<?= isset($dosen) ? base_url('/admin/dosen/update/' . $dosen['id']) : base_url('/admin/simpan-dosen') ?>" method="post" class="p-3 border rounded bg-light">
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Dosen</label>
        <input type="text" name="nama" id="nama" class="form-control" 
               value="<?= isset($dosen) ? esc($dosen['nama']) : '' ?>" required>
    </div>

    <div class="mb-3">
        <label for="nip" class="form-label">NIP</label>
        <input type="text" name="nip" id="nip" class="form-control" 
               value="<?= isset($dosen) ? esc($dosen['nip']) : '' ?>" required>
    </div>

    <div class="mb-3">
        <label for="prodi" class="form-label">Prodi</label>
        <input type="text" name="prodi" id="prodi" class="form-control" 
               value="<?= isset($dosen) ? esc($dosen['prodi']) : '' ?>" required>
    </div>

    <?php if (!isset($dosen)) : ?>
        <!-- Tambahkan hanya saat tambah -->
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
    <?php endif; ?>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="<?= base_url('/admin/dosen') ?>" class="btn btn-secondary">Batal</a>
</form>


