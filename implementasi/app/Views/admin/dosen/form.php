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

    <?php if (session()->getFlashdata('errors')) : ?>
        <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
            <ul class="list-disc pl-5">
                <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

<form action="<?= isset($dosen) ? base_url('/admin/dosen/update/' . $dosen['id']) : base_url('/admin/dosen/simpan') ?>" method="post">
    
    <?= csrf_field() ?>


        <div>
            <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Dosen</label>
            <input type="text" name="nama" id="nama" required
                   value="<?= old('nama', isset($dosen) ? $dosen['nama'] : '') ?>"
                   class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-500 shadow-sm">
        </div>

        <div>
            <label for="nidn" class="block text-sm font-medium text-gray-700 mb-1">NIDN</label>
            <input type="text" name="nidn" id="nidn" required
                   value="<?= old('nidn', isset($dosen) ? $dosen['nidn'] : '') ?>"
                   class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-500 shadow-sm">
        </div>

        <div>
            <label for="prodi" class="block text-sm font-medium text-gray-700 mb-1">Program Studi</label>
            <input type="text" name="prodi" id="prodi" required
                   value="<?= old('prodi', isset($dosen) ? $dosen['prodi'] : '') ?>"
                   class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-500 shadow-sm">
        </div>

        <div>
            <label for="fakultas" class="block text-sm font-medium text-gray-700 mb-1">Fakultas</label>
            <input type="text" name="fakultas" id="fakultas" required
                   value="<?= old('fakultas', isset($dosen) ? $dosen['fakultas'] : '') ?>"
                   class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-500 shadow-sm">
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" name="email" id="email" required
                   value="<?= old('email', isset($dosen) ? $dosen['email'] : '') ?>"
                   class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-500 shadow-sm">
        </div>

        <div>
            <label for="nomor_hp" class="block text-sm font-medium text-gray-700 mb-1">Nomor HP</label>
            <input type="text" name="nomor_hp" id="nomor_hp" required
                   value="<?= old('nomor_hp', isset($dosen) ? $dosen['nomor_hp'] : '') ?>"
                   class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-500 shadow-sm">
        </div>

        <div>
            <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
            <textarea name="alamat" id="alamat" required rows="3"
                      class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-500 shadow-sm"><?= old('alamat', isset($dosen) ? $dosen['alamat'] : '') ?></textarea>
        </div>

        <?php if (!isset($dosen)) : ?>
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                <input type="text" name="username" id="username" required
                       value="<?= old('username') ?>"
                       class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-500 shadow-sm">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" id="password" required
                       class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-500 shadow-sm">
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
