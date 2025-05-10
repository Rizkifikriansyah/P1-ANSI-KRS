<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="/krs/create" class="btn btn-primary mt-3">Tambah Mata Kuliah</a>
            <h1 class="mt-2">Daftar Mata Kuliah</h1>

            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Mata Kuliah</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Dosen Pengajar</th>
                        <th scope="col">Hari</th>
                        <th scope="col">Sks</th>
                        <th scope="col">Aksi</th> <!-- Tambahan -->
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($krs as $k) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $k['mata_kuliah']; ?></td>
                            <td><?= $k['kelas']; ?></td>
                            <td><?= $k['dosen']; ?></td>
                            <td><?= $k['hari']; ?></td>
                            <td><?= $k['sks']; ?></td>
                            <td>
                                <!-- Tombol Edit -->
                                <a href="/krs/edit/<?= $k['id']; ?>" class="btn btn-warning btn-sm">Edit</a>

                                <!-- Tombol Delete -->
                                <form action="/krs/<?= $k['id']; ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
