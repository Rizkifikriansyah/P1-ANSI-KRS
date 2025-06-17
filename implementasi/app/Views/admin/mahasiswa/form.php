<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= isset($mahasiswa) ? 'Edit' : 'Tambah' ?> Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="bg-gray-100 min-h-screen py-6 px-4">

<div class="max-w-xl mx-auto bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-bold text-blue-700 mb-6">
        <?= isset($mahasiswa) ? 'Edit' : 'Tambah' ?> Mahasiswa
    </h2>

    <?php if (session()->getFlashdata('errors')) : ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc list-inside">
                <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?= isset($mahasiswa) ? '/admin/mahasiswa/update/' . $mahasiswa['id'] : '/admin/mahasiswa/simpan' ?>"
          method="post" class="space-y-5">
        
        <?= csrf_field() ?>

        <div>
            <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
            <input type="text" name="nama" id="nama" required
                   value="<?= old('nama', $mahasiswa['nama'] ?? '') ?>"
                   class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm">
        </div>

        <div>
            <label for="nim" class="block text-sm font-medium text-gray-700 mb-1">NIM</label>
            <input type="text" name="nim" id="nim" required
                   value="<?= old('nim', $mahasiswa['nim'] ?? '') ?>"
                   class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm">
        </div>

        <div>
            <label for="prodi" class="block text-sm font-medium text-gray-700 mb-1">Prodi</label>
            <input type="text" name="prodi" id="prodi" required
                   value="<?= old('prodi', $mahasiswa['prodi'] ?? '') ?>"
                   class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm">
        </div>

        <div>
            <label for="angkatan" class="block text-sm font-medium text-gray-700 mb-1">Angkatan</label>
            <input type="number" name="angkatan" id="angkatan" required min="2000" max="2100"
                   value="<?= old('angkatan', $mahasiswa['angkatan'] ?? '') ?>"
                   class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm">
        </div>

        <div>
            <label for="nomor_hp" class="block text-sm font-medium text-gray-700 mb-1">Nomor HP</label>
            <input type="text" name="nomor_hp" id="nomor_hp" required
                   value="<?= old('nomor_hp', $mahasiswa['nomor_hp'] ?? '') ?>"
                   class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm">
        </div>

        <div>
            <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
            <textarea name="alamat" id="alamat" rows="3" required
                      class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm"><?= old('alamat', $mahasiswa['alamat'] ?? '') ?></textarea>
        </div>

        <?php if (!isset($mahasiswa)) : ?>
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                <input type="text" name="username" id="username" required
                       value="<?= old('username') ?>"
                       class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" id="password" required
                       class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm">
            </div>
        <?php endif; ?>

        <div class="flex items-center justify-between mt-6">
            <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white font-semibold px-5 py-2 rounded shadow transition">
                Simpan
            </button>
            <a href="/admin/mahasiswa"
               class="text-gray-600 hover:text-gray-800 underline text-sm">Batal</a>
        </div>
    </form>
</div>

</body>
</html>
