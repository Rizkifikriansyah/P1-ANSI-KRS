<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Mata Kuliah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="bg-gray-100 min-h-screen text-gray-800">

<div class="max-w-7xl mx-auto px-4 py-8">
    <!-- Form Pencarian -->
<form method="get" class="mb-4 flex flex-col sm:flex-row items-center gap-2">
    <input type="text" name="q" value="<?= esc($keyword ?? '') ?>" placeholder="Cari nama atau kode mata kuliah..."
        class="w-full sm:w-64 px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">

    <button type="submit"
        class="px-4 py-2 bg-blue-600 text-white text-sm rounded hover:bg-blue-700 transition">
        🔍 Cari
    </button>
</form>

    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-blue-700">Kelola Mata Kuliah</h2>
        <div class="mt-4 sm:mt-0 flex gap-2">
            <a href="/dashboard/admin" class="px-4 py-2 text-sm border border-gray-400 rounded hover:bg-gray-100 transition">
                ← Kembali
            </a>
            <a href="/admin/matakuliah/tambah" class="px-4 py-2 text-sm bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                + Tambah Mata Kuliah
            </a>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full text-sm divide-y divide-gray-200">
            <thead class="bg-blue-100 text-blue-800 font-semibold">
                <tr>
                    <th class="px-4 py-3 text-left">Kode</th>
                    <th class="px-4 py-3 text-left">Nama</th>
                    <th class="px-4 py-3 text-left">SKS</th>
                    <th class="px-4 py-3 text-left">Semester</th>
                    <th class="px-4 py-3 text-left">Kelas</th>
                    <th class="px-4 py-3 text-left">Ruang</th>
                    <th class="px-4 py-3 text-left">Hari</th>
                    <th class="px-4 py-3 text-left">Waktu</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php foreach ($matakuliah as $mk): ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3"><?= esc($mk['kode']) ?></td>
                    <td class="px-4 py-3"><?= esc($mk['nama']) ?></td>
                    <td class="px-4 py-3"><?= esc($mk['sks']) ?></td>
                    <td class="px-4 py-3"><?= esc($mk['semester']) ?></td>
                    <td class="px-4 py-3"><?= esc($mk['kelas']) ?></td>
                    <td class="px-4 py-3"><?= esc($mk['ruang']) ?></td>
                    <td class="px-4 py-3"><?= esc($mk['hari']) ?></td>
                    <td class="px-4 py-3"><?= esc($mk['waktu']) ?></td>
                    <td class="px-4 py-3 text-center space-x-1">
                        <a href="/admin/matakuliah/edit/<?= $mk['id'] ?>" 
                           class="inline-block px-3 py-1 bg-yellow-400 text-white rounded text-xs hover:bg-yellow-500 transition">
                            ✏️ Edit
                        </a>
                        <a href="/admin/matakuliah/hapus/<?= $mk['id'] ?>" 
                           onclick="return confirm('Yakin hapus?')"
                           class="inline-block px-3 py-1 bg-red-500 text-white rounded text-xs hover:bg-red-600 transition">
                            🗑️ Hapus
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>

                <?php if (empty($matakuliah)): ?>
                <tr>
                    <td colspan="9" class="px-4 py-6 text-center text-gray-500 italic">
                        Belum ada data mata kuliah.
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
