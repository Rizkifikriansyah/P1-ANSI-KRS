<!DOCTYPE html>
<html>
<head>
    <title><?= isset($matakuliah) ? 'Edit' : 'Tambah' ?> Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
    <h2><?= isset($matakuliah) ? 'Edit' : 'Tambah' ?> Mata Kuliah</h2>
    <form action="<?= isset($matakuliah) ? '/admin/matakuliah/update/' . $matakuliah['id'] : '/admin/matakuliah/simpan' ?>" method="post">
        <div class="mb-3">
            <label>Kode</label>
            <input type="text" name="kode" class="form-control" value="<?= isset($matakuliah) ? esc($matakuliah['kode']) : '' ?>" required>
        </div>
        <div class="mb-3">
            <label>Nama Mata Kuliah</label>
            <input type="text" name="nama" class="form-control" value="<?= isset($matakuliah) ? esc($matakuliah['nama']) : '' ?>" required>
        </div>
        <div class="mb-3">
            <label>SKS</label>
            <input type="number" name="sks" class="form-control" value="<?= isset($matakuliah) ? esc($matakuliah['sks']) : '' ?>" required>
        </div>
        <div class="mb-3">
            <label>Semester</label>
            <select name="semester" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="ganjil" <?= isset($matakuliah) && $matakuliah['semester'] == 'ganjil' ? 'selected' : '' ?>>Ganjil</option>
                <option value="genap" <?= isset($matakuliah) && $matakuliah['semester'] == 'genap' ? 'selected' : '' ?>>Genap</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Kelas</label>
            <input type="text" name="kelas" class="form-control" value="<?= isset($matakuliah) ? esc($matakuliah['kelas']) : '' ?>">
        </div>
        <div class="mb-3">
            <label>Ruang</label>
            <input type="text" name="ruang" class="form-control" value="<?= isset($matakuliah) ? esc($matakuliah['ruang']) : '' ?>">
        </div>
        <div class="mb-3">
            <label>Hari</label>
            <input type="text" name="hari" class="form-control" value="<?= isset($matakuliah) ? esc($matakuliah['hari']) : '' ?>">
        </div>
        <div class="mb-3">
            <label>Waktu</label>
            <input type="text" name="waktu" class="form-control" value="<?= isset($matakuliah) ? esc($matakuliah['waktu']) : '' ?>">
        </div>
            <div class="mb-3">
                <label>Dosen Pengampu</label>
                <select name="dosen_id" class="form-control" required>
                    <option value="">-- Pilih Dosen --</option>
                    <?php foreach ($daftarDosen as $d): ?>
                        <option value="<?= $d['id']; ?>"
                            <?= isset($matakuliah) && $matakuliah['dosen_id']==$d['id'] ? 'selected' : '' ?>>
                            <?= esc($d['nama']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>


        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="/admin/matakuliah" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>
