<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Isi KRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h3>Isi Kartu Rencana Studi (KRS)</h3>
    
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <form action="<?= base_url('/krs/store') ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="matakuliah_id" class="form-label">Pilih Mata Kuliah</label>
            <select class="form-select" name="matakuliah_id" id="matakuliah_id" required>
                <option value="">-- Pilih Mata Kuliah --</option>
                <?php foreach ($matakuliah as $mk): ?>
                    <option value="<?= $mk['id'] ?>">
                        <?= $mk['kode'] ?> - <?= $mk['nama'] ?> (<?= $mk['sks'] ?> SKS)
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
            <input type="text" class="form-control" name="tahun_ajaran" id="tahun_ajaran" value="<?= date('Y') . '/' . (date('Y') + 1) ?>" required>
        </div>

        <div class="mb-3">
            <label for="semester" class="form-label">Semester</label>
            <select name="semester" id="semester" class="form-select" required>
                <option value="">-- Pilih Semester --</option>
                <option value="ganjil">Ganjil</option>
                <option value="genap">Genap</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan KRS</button>
        <a href="<?= base_url('/dashboard/mahasiswa') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html>
