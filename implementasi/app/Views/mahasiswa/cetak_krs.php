<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cetak KRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body class="p-5">

<div class="container">
    <div class="text-center mb-4">
        <h3>Kartu Rencana Studi (KRS)</h3>
        <h5><?= esc($mahasiswa['nama']) ?> - <?= esc($mahasiswa['nim']) ?></h5>
    </div>

    <?php if (!empty($matakuliah)): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Semester</th>
                    <th>Tahun Ajaran</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($matakuliah as $mk): ?>
                    <tr>
                        <td><?= esc($mk['kode']) ?></td>
                        <td><?= esc($mk['nama']) ?></td>
                        <td><?= esc($mk['sks']) ?></td>
                        <td><?= esc($mk['semester']) ?></td>
                        <td><?= esc($mk['tahun_ajaran']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-warning">
            Anda belum mengisi KRS.
        </div>
    <?php endif; ?>

    <div class="text-center mt-4 no-print">
        <button onclick="window.print()" class="btn btn-primary">Cetak KRS</button>
        <a href="<?= base_url('/dashboard/mahasiswa') ?>" class="btn btn-secondary">Kembali</a>
    </div>
</div>

</body>
</html>
