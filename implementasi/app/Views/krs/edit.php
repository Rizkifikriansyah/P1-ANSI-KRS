<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-4">
    <h2><?= $title; ?></h2>


    <form action="/krs/update/<?= $krs['id']; ?>" method="post">
        <?= csrf_field(); ?>

        <div class="mb-3">
            <label>Mata Kuliah</label>
            <input type="text" name="mata_kuliah" class="form-control" value="<?= $krs['mata_kuliah']; ?>">
        </div>

        <div class="mb-3">
            <label>Kelas</label>
            <input type="text" name="kelas" class="form-control" value="<?= $krs['kelas']; ?>">
        </div>

        <div class="mb-3">
            <label>Dosen Pengajar</label>
            <input type="text" name="dosen" class="form-control" value="<?= $krs['dosen']; ?>">
        </div>

        <div class="mb-3">
            <label>Hari</label>
            <input type="text" name="hari" class="form-control" value="<?= $krs['hari']; ?>">
        </div>

        <div class="mb-3">
            <label>SKS</label>
            <input type="number" name="sks" class="form-control" value="<?= $krs['sks']; ?>">
        </div>

        <button type="submit" class="btn btn-primary">Update Data</button>
    </form>
</div>
<?= $this->endSection(); ?>
