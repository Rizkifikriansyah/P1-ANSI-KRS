<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2>Dashboard Dosen</h2>

    <div class="card mt-3">
        <div class="card-header bg-success text-white">
            Daftar Persetujuan KRS
        </div>
        <div class="card-body">
            <?php if (!empty($persetujuan_krs)): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Mahasiswa</th>
                        <th>Mata Kuliah</th>
                        <th>Semester</th>
                        <th>Status</th>
                        <th>Catatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($persetujuan_krs as $item): ?>
                    <tr>
                        <td><?= esc($item['nama_mahasiswa']) ?></td>
                        <td><?= esc($item['nama_mk']) ?></td>
                        <td><?= esc($item['semester']) ?></td>
                        <td><?= esc($item['status']) ?></td>
                        <td><?= esc($item['catatan']) ?></td>
                        <td>
                            <?php if ($item['status'] == 'menunggu'): ?>
                            <a href="<?= base_url('dosen/persetujuan/setuju/'.$item['id']) ?>" class="btn btn-sm btn-success">Setujui</a>
                            <a href="<?= base_url('dosen/persetujuan/tolak/'.$item['id']) ?>" class="btn btn-sm btn-danger">Tolak</a>
                            <?php else: ?>
                            <em>Sudah diproses</em>
                            <?php endif ?>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <?php else: ?>
                <p>Tidak ada KRS yang menunggu persetujuan.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
