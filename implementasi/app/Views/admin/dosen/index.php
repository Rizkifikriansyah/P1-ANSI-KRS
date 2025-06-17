<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Dosen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?= base_url('css/style.css?v=1.0.3') ?>">
</head>
<body class="bg-gray-100 min-h-screen">

<div class="container mx-auto px-4 py-10">

    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
        <h2 class="text-2xl font-bold text-blue-700">Kelola Dosen</h2>
        <div class="flex space-x-2">
            <a href="/dashboard/admin" class="px-4 py-2 text-sm bg-white border border-gray-300 rounded hover:bg-gray-100">← Kembali</a>
            <a href="/admin/dosen/tambah" class="px-4 py-2 text-sm bg-blue-600 text-white rounded hover:bg-blue-700">+ Tambah Dosen</a>
        </div>
    </div>

    <div class="mb-4">
    <form action="<?= base_url('/admin/dosen') ?>" method="get" class="flex items-center space-x-2">
        <input type="text" name="keyword" value="<?= esc($_GET['keyword'] ?? '') ?>" placeholder="Cari nama, NIDN, atau Prodi..." 
            class="px-3 py-2 border rounded w-full max-w-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 text-sm">Cari</button>
    </form>
</div>


    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-blue-100 text-left text-gray-700">
                <tr>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">NIDN</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Fakultas</th>
                    <th class="px-4 py-3">Prodi</th>
                    <th class="px-4 py-3">No. HP</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php foreach ($dosen as $dsn): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3"><?= esc($dsn['nama']) ?></td>
                        <td class="px-4 py-3"><?= esc($dsn['nidn']) ?></td>
                        <td class="px-4 py-3"><?= esc($dsn['email']) ?></td>
                        <td class="px-4 py-3"><?= esc($dsn['fakultas']) ?></td>
                        <td class="px-4 py-3"><?= esc($dsn['prodi']) ?></td>
                        <td class="px-4 py-3"><?= esc($dsn['nomor_hp']) ?></td>
                        <td class="px-4 py-3 text-center space-x-1">
                            <a href="/admin/dosen/edit/<?= $dsn['id'] ?>" class="inline-block bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500 text-xs">
                                ✏️ Edit
                            </a>
                            <a href="/admin/dosen/hapus/<?= $dsn['id'] ?>" onclick="return confirm('Yakin ingin menghapus dosen ini?')" class="inline-block bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-xs">
                                🗑️ Hapus
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if (empty($dosen)): ?>
                    <tr>
                        <td colspan="7" class="px-4 py-4 text-center text-gray-500 italic">Belum ada data dosen.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

</body>
</html>
