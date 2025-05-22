<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2>Dashboard Mahasiswa</h2>

    <div class="card mt-3">
        <div class="card-header bg-primary text-white">
            Mata Kuliah yang Diambil
        </div>
        <div class="card-body">
            <?php if (!empty($krs)): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kode MK</th>
                        <th>Nama MK</th>
                        <th>SKS</th>
                        <th>Semester</th>
                        <th>Tahun Ajaran</th>
                        <th>Status Persetujuan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($krs as $item): ?>
                    <tr>
                        <td><?= esc($item['kode_mk']) ?></td>
                        <td><?= esc($item['nama_mk']) ?></td>
                        <td><?= esc($item['sks']) ?></td>
                        <td><?= esc($item['semester']) ?></td>
                        <td><?= esc($item['tahun_ajaran']) ?></td>
                        <td><?= esc($item['status_persetujuan']) ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <?php else: ?>
                <p>Belum ada KRS yang diambil.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
