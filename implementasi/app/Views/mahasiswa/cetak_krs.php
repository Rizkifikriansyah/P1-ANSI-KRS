<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kartu Rencana Studi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style type="text/tailwindcss">
        @media print {
            .no-print { display: none !important; }
        }
    </style>
</head>
<body class="relative bg-white text-gray-900 font-sans p-8">

    <!-- Background Logo -->
    <div class="absolute inset-0 z-0 opacity-10 bg-center bg-no-repeat bg-contain pointer-events-none"
         style="background-image: url('<?= base_url('image/umb.jpeg') ?>'); background-size: 400px;">
    </div>

    <div class="relative z-10 max-w-4xl mx-auto border border-gray-300 p-6 rounded shadow-sm bg-white">
        <div class="text-center mb-6">
            <h2 class="text-2xl font-bold uppercase tracking-wide">Kartu Rencana Studi</h2>
            <p class="text-sm text-gray-600 mt-1">Universitas Muhammadiyah Bima</p>
        </div>

        <div class="mb-4 text-sm space-y-1">
            <p><strong>Nama:</strong> <?= esc($mahasiswa['nama']) ?></p>
            <p><strong>NIM:</strong> <?= esc($mahasiswa['nim']) ?></p>
            <p><strong>Program Studi:</strong> <?= esc($mahasiswa['prodi'] ?? '-') ?></p>
            <p><strong>Tahun Ajaran:</strong> <?= esc($tahun_ajaran) ?></p>
            <p><strong>Semester:</strong> <?= ucfirst(esc($semester)) ?></p>
        </div>

        <table class="w-full border border-gray-300 text-sm mt-6">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="border px-3 py-2">No</th>
                    <th class="border px-3 py-2">Kode</th>
                    <th class="border px-3 py-2">Nama Mata Kuliah</th>
                    <th class="border px-3 py-2 text-center">SKS</th>
                    <th class="border px-3 py-2 text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($matakuliah as $mk): ?>
                <tr class="hover:bg-gray-50">
                    <td class="border px-3 py-2"><?= $no++ ?></td>
                    <td class="border px-3 py-2"><?= esc($mk['kode']) ?></td>
                    <td class="border px-3 py-2"><?= esc($mk['nama']) ?></td>
                    <td class="border px-3 py-2 text-center"><?= esc($mk['sks']) ?></td>
                    <td class="border px-3 py-2 text-center">
                        <?= $mk['is_approved'] ? '<span class="text-green-600 font-medium">Disetujui</span>' : '<span class="text-red-500 font-medium">Belum</span>' ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="mt-12 text-sm text-right">
            <p>Kota Bima, <?= date('d M Y') ?></p>
            <p class="mt-12">______________________</p>
            <p class="mt-1">Teguh Anshor Lorosae M.Kom</p>
        </div>
    </div>

    <script>
        window.print();
    </script>
</body>
</html>
