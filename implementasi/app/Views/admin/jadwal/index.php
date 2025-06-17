<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Jadwal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen text-gray-800">

<div class="max-w-6xl mx-auto px-4 py-8">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
        <div>
            <h1 class="text-2xl font-bold text-blue-700">Kelola Jadwal Perkuliahan</h1>
            <p class="text-sm text-gray-500">Daftar jadwal mata kuliah yang sudah ditentukan.</p>
        </div>
        <div class="flex gap-2">
            <a href="/dashboard/admin"
               class="px-4 py-2 text-sm border border-gray-300 text-gray-700 rounded hover:bg-gray-100 transition">
                ← Kembali
            </a>
            <a href="/admin/jadwal/form"
               class="px-4 py-2 text-sm bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                + Tambah Jadwal
            </a>
        </div>
    </div>

    <!-- Flash Message -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="mb-4 px-4 py-2 bg-green-100 text-green-700 rounded shadow-sm">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <!-- Tabel -->
    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full text-sm text-left divide-y divide-gray-200">
            <thead class="bg-gray-100 text-xs font-semibold text-gray-600 uppercase">
                <tr>
                    <th class="px-4 py-3">Mata Kuliah</th>
                    <th class="px-4 py-3">Dosen</th>
                    <th class="px-4 py-3">Kelas</th>
                    <th class="px-4 py-3">Ruang</th>
                    <th class="px-4 py-3">Hari</th>
                    <th class="px-4 py-3">Waktu</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php foreach ($jadwal as $j): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3"><?= esc($j['nama_matakuliah']) ?></td>
                        <td class="px-4 py-3"><?= esc($j['nama_dosen']) ?></td>
                        <td class="px-4 py-3"><?= esc($j['kelas']) ?></td>
                        <td class="px-4 py-3"><?= esc($j['ruang']) ?></td>
                        <td class="px-4 py-3"><?= esc($j['hari']) ?></td>
                        <td class="px-4 py-3"><?= esc($j['waktu']) ?></td>
                        <td class="px-4 py-3 text-center">
                            <div class="flex justify-center gap-1">
                                <a href="/admin/jadwal/edit/<?= $j['id'] ?>"
                                   class="px-3 py-1 bg-yellow-400 text-white rounded text-xs hover:bg-yellow-500 transition">
                                    Edit
                                </a>
                                <a href="/admin/jadwal/hapus/<?= $j['id'] ?>"
                                   class="px-3 py-1 bg-red-500 text-white rounded text-xs hover:bg-red-600 transition"
                                   onclick="return confirm('Yakin ingin menghapus?')">
                                    Hapus
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

</div>

</body>
</html>
