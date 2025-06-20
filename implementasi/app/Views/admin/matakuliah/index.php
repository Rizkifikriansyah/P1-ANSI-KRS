<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Mata Kuliah</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen text-gray-800">

<div class="max-w-6xl mx-auto px-4 py-8">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
        <div>
            <h1 class="text-2xl font-bold text-blue-700">Kelola Mata Kuliah</h1>
            <p class="text-sm text-gray-500">Daftar lengkap mata kuliah yang tersedia.</p>
        </div>
        <div class="flex gap-2">
            <a href="/dashboard/admin"
               class="px-4 py-2 text-sm border border-gray-300 text-gray-700 rounded hover:bg-gray-100 transition">
                ← Kembali
            </a>
            <a href="/admin/matakuliah/tambah"
               class="px-4 py-2 text-sm bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                + Tambah Mata Kuliah
            </a>
        </div>
    </div>

    <!-- Form Pencarian -->
    <form method="get" class="mb-6">
        <div class="flex flex-col sm:flex-row gap-2 items-start sm:items-center">
            <input type="text" name="q" value="<?= esc($keyword ?? '') ?>"
                   placeholder="Cari nama atau kode mata kuliah..."
                   class="w-full sm:w-80 px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm">
            <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm transition">
                🔍 Cari
            </button>
        </div>
    </form>

    <!-- Tabel -->
    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full text-sm text-left divide-y divide-gray-200">
            <thead class="bg-gray-100 text-xs font-semibold text-gray-600 uppercase">
                <tr>
                    <th class="px-4 py-3">Kode</th>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">SKS</th>
                    <th class="px-4 py-3">Semester</th>
                    <th class="px-4 py-3">Tahun Ajaran</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php foreach ($matakuliah as $mk): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3"><?= esc($mk['kode']) ?></td>
                        <td class="px-4 py-3"><?= esc($mk['nama']) ?></td>
                        <td class="px-4 py-3"><?= esc($mk['sks']) ?></td>
                        <td class="px-4 py-3"><?= esc($mk['semester']) ?></td>
                        <td class="px-4 py-3"><?= esc($mk['tahun_ajaran']) ?></td>
                        <td class="px-4 py-3 text-center">
                            <div class="flex justify-center gap-1">
                                <a href="/admin/matakuliah/edit/<?= $mk['id'] ?>"
                                   class="px-3 py-1 bg-yellow-400 text-white rounded text-xs hover:bg-yellow-500 transition">
                                    Edit
                                </a>
                                <a href="/admin/matakuliah/hapus/<?= $mk['id'] ?>"
                                   class="px-3 py-1 bg-red-500 text-white rounded text-xs hover:bg-red-600 transition"
                                   onclick="return confirm('Yakin ingin menghapus?')">
                                    Hapus
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

</body>
</html>
