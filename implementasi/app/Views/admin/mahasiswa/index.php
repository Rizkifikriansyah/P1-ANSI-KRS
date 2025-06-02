<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="bg-gray-100 min-h-screen text-gray-800">

<div class="max-w-6xl mx-auto px-4 py-8">
    <div class="flex flex-col sm:flex-row justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-blue-700">Kelola Mahasiswa</h2>
        <div class="mt-4 sm:mt-0 flex gap-2">
            <a href="/dashboard/admin" class="text-sm px-4 py-2 border border-gray-400 rounded hover:bg-gray-100 transition">
                ← Kembali
            </a>
            <a href="/admin/mahasiswa/tambah" class="bg-blue-600 text-white text-sm px-4 py-2 rounded hover:bg-blue-700 transition">
                + Tambah Mahasiswa
            </a>
        </div>
    </div>

    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-blue-100 text-blue-800 font-semibold">
                <tr>
                    <th class="text-left px-4 py-3">Nama</th>
                    <th class="text-left px-4 py-3">NIM</th>
                    <th class="text-left px-4 py-3">Prodi</th>
                    <th class="text-center px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php foreach ($mahasiswa as $mhs): ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3"><?= esc($mhs['nama']) ?></td>
                    <td class="px-4 py-3"><?= esc($mhs['nim']) ?></td>
                    <td class="px-4 py-3"><?= esc($mhs['prodi']) ?></td>
                    <td class="px-4 py-3 text-center">
                        <a href="/admin/mahasiswa/edit/<?= $mhs['id'] ?>"
                           class="inline-block bg-yellow-400 text-white px-3 py-1 rounded text-xs hover:bg-yellow-500 transition">
                            ✏️ Edit
                        </a>
                        <a href="/admin/mahasiswa/hapus/<?= $mhs['id'] ?>"
                           onclick="return confirm('Yakin ingin menghapus mahasiswa ini?')"
                           class="inline-block bg-red-500 text-white px-3 py-1 rounded text-xs hover:bg-red-600 transition ml-1">
                            🗑️ Hapus
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
                
                <?php if (empty($mahasiswa)) : ?>
                <tr>
                    <td colspan="4" class="text-center px-4 py-6 text-gray-500 italic">
                        Tidak ada data mahasiswa.
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
