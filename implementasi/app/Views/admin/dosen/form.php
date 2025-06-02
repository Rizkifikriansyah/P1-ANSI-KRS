<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= isset($dosen) ? 'Edit' : 'Tambah' ?> Dosen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="bg-gray-100 min-h-screen p-6">

<div class="max-w-xl mx-auto bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold text-blue-700 mb-6">
        <?= isset($dosen) ? 'Edit' : 'Tambah' ?> Dosen
    </h2>

    <form action="<?= isset($dosen) ? base_url('/admin/dosen/update/' . $dosen['id']) : base_url('/admin/simpan-dosen') ?>" method="post" class="space-y-5">

        <div>
            <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Dosen</label>
            <input type="text" name="nama" id="nama" required
                   value="<?= isset($dosen) ? esc($dosen['nama']) : '' ?>"
                   class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm">
        </div>

        <div>
            <label for="nip" class="block text-sm font-medium text-gray-700 mb-1">NIP</label>
            <input type="text" name="nip" id="nip" required
                   value="<?= isset($dosen) ? esc($dosen['nip']) : '' ?>"
                   class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm">
        </div>

        <div>
            <label for="prodi" class="block text-sm font-medium text-gray-700 mb-1">Prodi</label>
            <input type="text" name="prodi" id="prodi" required
                   value="<?= isset($dosen) ? esc($dosen['prodi']) : '' ?>"
                   class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm">
        </div>

        <?php if (!isset($dosen)) : ?>
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                <input type="text" name="username" id="username" required
                       class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" id="password" required
                       class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm">
            </div>
        <?php endif; ?>

        <div class="flex items-center justify-between">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded shadow transition">
                Simpan
            </button>
            <a href="<?= base_url('/admin/dosen') ?>"
               class="text-gray-600 hover:text-gray-800 underline text-sm">Batal</a>
        </div>
    </form>
</div>

</body>
</html>
