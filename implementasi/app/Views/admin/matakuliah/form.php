<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= isset($matakuliah) ? 'Edit' : 'Tambah' ?> Mata Kuliah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-6">

<div class="w-full max-w-2xl bg-white shadow-xl rounded-lg p-8">
    <h2 class="text-2xl font-bold text-center mb-6 text-blue-700">
        <?= isset($matakuliah) ? 'Edit' : 'Tambah' ?> Mata Kuliah
    </h2>

    <form action="<?= isset($matakuliah) ? '/admin/matakuliah/update/' . $matakuliah['id'] : '/admin/matakuliah/simpan' ?>" method="post" class="space-y-5">

        <div>
            <label for="kode" class="block text-sm font-medium text-gray-700 mb-1">Kode Mata Kuliah</label>
            <input type="text" id="kode" name="kode" value="<?= old('kode', $matakuliah['kode'] ?? '') ?>" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
        </div>

        <div>
            <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Mata Kuliah</label>
            <input type="text" id="nama" name="nama" value="<?= old('nama', $matakuliah['nama'] ?? '') ?>" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
        </div>

        <div>
            <label for="sks" class="block text-sm font-medium text-gray-700 mb-1">SKS</label>
            <input type="number" id="sks" name="sks" value="<?= old('sks', $matakuliah['sks'] ?? '') ?>" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
        </div>

        <div>
            <label for="semester" class="block text-sm font-medium text-gray-700 mb-1">Semester</label>
            <select id="semester" name="semester" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
                <option value="">-- Pilih Semester --</option>
                <option value="ganjil" <?= old('semester', $matakuliah['semester'] ?? '') === 'ganjil' ? 'selected' : '' ?>>Ganjil</option>
                <option value="genap" <?= old('semester', $matakuliah['semester'] ?? '') === 'genap' ? 'selected' : '' ?>>Genap</option>
            </select>
        </div>

        <div>
            <label for="tahun_ajaran" class="block text-sm font-medium text-gray-700 mb-1">Tahun Ajaran</label>
            <input type="text" id="tahun_ajaran" name="tahun_ajaran" value="<?= old('tahun_ajaran', $matakuliah['tahun_ajaran'] ?? '') ?>" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300"
                placeholder="contoh: 2024/2025">
        </div>

        <div class="flex justify-end">
            <a href="/admin/matakuliah" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 mr-2">Batal</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                Simpan
            </button>
        </div>

    </form>
</div>

</body>
</html>
