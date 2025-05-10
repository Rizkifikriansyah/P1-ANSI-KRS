<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-4">
    <h2><?= $title; ?></h2>

    <a href="/laporan/cetak" class="btn btn-danger mb-3">Cetak PDF</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Mata Kuliah</th>
                <th>Kelas</th>
                <th>Dosen</th>
                <th>Hari</th>
                <th>SKS</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($krs as $k) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $k['mata_kuliah']; ?></td>
                    <td><?= $k['kelas']; ?></td>
                    <td><?= $k['dosen']; ?></td>
                    <td><?= $k['hari']; ?></td>
                    <td><?= $k['sks']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>
