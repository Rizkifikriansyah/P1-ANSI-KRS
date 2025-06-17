<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Dosen</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

<!-- Navbar -->
<nav class="bg-blue-600 text-white shadow">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <div class="flex items-center space-x-3">
            <img src="<?= base_url('image/umb.jpeg') ?>" alt="Logo Kampus" class="w-8 h-8 rounded-full">
            <a href="/" class="text-lg font-semibold hover:text-yellow-300">Universitas Muhammadiyah Bima</a>
        </div>
        <div class="flex items-center space-x-4">
            <span><?= esc(session()->get('name')) ?> (Dosen)</span>
            <a href="<?= base_url('/logout') ?>" class="hover:underline">Logout</a>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="max-w-6xl mx-auto mt-8 px-4">
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
        <h4 class="text-xl font-bold">Halo, <?= esc(session()->get('name')) ?> (Dosen)</h4>
    </div>
    <p class="text-gray-600 mb-6">Berikut adalah daftar mata kuliah yang Anda ampu, beserta mahasiswa yang mengambilnya.</p>

<?php if (!empty($jadwalList)): ?>
    <?php foreach ($jadwalList as $mk): ?>
            <div class="bg-white shadow rounded mb-8 overflow-hidden">
                <div class="bg-blue-500 text-white px-6 py-4">
                    <h5 class="font-bold text-lg"><?= esc($mk['nama_matakuliah']) ?> (<?= esc($mk['kode_matakuliah']) ?>)</h5>
                    <p class="text-sm">Semester: <?= esc($mk['semester']) ?> | Kelas: <?= esc($mk['kelas']) ?> | Ruang: <?= esc($mk['ruang']) ?></p>
                    <p class="text-sm">Hari: <?= esc($mk['hari']) ?> | Jam: <?= esc($mk['waktu']) ?></p>
                </div>
<!-- Form Approve Semua Mahasiswa dalam 1 Mata Kuliah -->
<form action="<?= base_url('/krs/approve') ?>" method="post">
    <?= csrf_field() ?>
    <input type="hidden" name="matakuliah_id" value="<?= esc($mk['id']) ?>">

    <table class="min-w-full text-sm text-left text-gray-700">
        <thead class="bg-gray-100 text-gray-900">
            <tr>
                <th class="px-4 py-2 border">No</th>
                <th class="px-4 py-2 border">Nama Mahasiswa</th>
                <th class="px-4 py-2 border">NIM</th>
                <th class="px-4 py-2 border">Prodi</th>
                <th class="px-4 py-2 border text-center">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $adaBelumDisetujui = false;
            if (!empty($mk['mahasiswa'])): 
                foreach ($mk['mahasiswa'] as $i => $mhs): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border"><?= $i + 1 ?></td>
                        <td class="px-4 py-2 border"><?= esc($mhs['nama']) ?></td>
                        <td class="px-4 py-2 border"><?= esc($mhs['nim']) ?></td>
                        <td class="px-4 py-2 border"><?= esc($mhs['prodi']) ?></td>
                        <td class="px-4 py-2 border text-center">
                            <?php if (!isset($mhs['is_approved']) || !$mhs['is_approved']): ?>
                                <?php if (isset($mhs['krs_id'])): ?>
                                    <input type="hidden" name="approve[]" value="<?= esc($mhs['krs_id']) ?>">
                                <?php endif; ?>
                                <?php $adaBelumDisetujui = true; ?>
                                <span class="text-red-500 font-medium text-sm">Belum Disetujui</span>
                            <?php else: ?>
                                <span class="text-green-600 font-semibold text-sm">Disetujui</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach;
            else: ?>
                <tr>
                    <td colspan="5" class="px-4 py-3 text-center text-gray-500 border">
                        Belum ada mahasiswa yang mengambil mata kuliah ini.
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <?php if (!empty($mk['mahasiswa']) && $adaBelumDisetujui): ?>
        <!-- Tombol Approve Semua -->
        <div class="p-4 bg-gray-50 border-t flex justify-end">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                Approve Semua Mahasiswa
            </button>
        </div>
    <?php endif; ?>
</form>

            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="bg-blue-100 border border-blue-300 text-blue-800 px-4 py-3 rounded">
            Belum ada mata kuliah yang Anda ampu.
        </div>
    <?php endif; ?>
</div>

</body>
</html>
