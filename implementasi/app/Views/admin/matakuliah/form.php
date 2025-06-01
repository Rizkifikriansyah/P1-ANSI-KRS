<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= isset($matakuliah) ? 'Edit' : 'Tambah' ?> Mata Kuliah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-6">

<div class="w-full max-w-3xl bg-white shadow-lg rounded-xl p-8">
    <h2 class="text-2xl font-bold text-center mb-6 text-gray-700">
        <?= isset($matakuliah) ? 'Edit' : 'Tambah' ?> Mata Kuliah
    </h2>

    <form action="<?= isset($matakuliah) ? '/admin/matakuliah/update/' . $matakuliah['id'] : '/admin/matakuliah/simpan' ?>" method="post" class="space-y-5">

        <!-- Kode -->
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">Kode</label>
            <input type="text" name="kode" required
                   value="<?= isset($matakuliah) ? esc($matakuliah['kode']) : '' ?>"
                   class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Nama Mata Kuliah -->
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">Nama Mata Kuliah</label>
            <input type="text" name="nama" required
                   value="<?= isset($matakuliah) ? esc($matakuliah['nama']) : '' ?>"
                   class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- SKS -->
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">SKS</label>
            <input type="number" name="sks" required
                   value="<?= isset($matakuliah) ? esc($matakuliah['sks']) : '' ?>"
                   class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Semester -->
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">Semester</label>
            <select name="semester" required
                    class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">-- Pilih --</option>
                <option value="ganjil" <?= isset($matakuliah) && $matakuliah['semester'] == 'ganjil' ? 'selected' : '' ?>>Ganjil</option>
                <option value="genap" <?= isset($matakuliah) && $matakuliah['semester'] == 'genap' ? 'selected' : '' ?>>Genap</option>
            </select>
        </div>

        <!-- Tahun Ajaran -->
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">Tahun Ajaran</label>
            <input type="text" name="tahun_ajaran" required placeholder="contoh: 2024/2025"
                   value="<?= old('tahun_ajaran', $matakuliah['tahun_ajaran'] ?? '') ?>"
                   class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Kelas -->
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">Kelas</label>
            <input type="text" name="kelas"
                   value="<?= isset($matakuliah) ? esc($matakuliah['kelas']) : '' ?>"
                   class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Ruang -->
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">Ruang</label>
            <input type="text" name="ruang"
                   value="<?= isset($matakuliah) ? esc($matakuliah['ruang']) : '' ?>"
                   class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Hari -->
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">Hari</label>
            <input type="text" name="hari"
                   value="<?= isset($matakuliah) ? esc($matakuliah['hari']) : '' ?>"
                   class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Waktu -->
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">Waktu</label>
            <input type="text" name="waktu"
                   value="<?= isset($matakuliah) ? esc($matakuliah['waktu']) : '' ?>"
                   class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Dosen Pengampu -->
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">Dosen Pengampu</label>
            <select name="dosen_id" required
                    class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">-- Pilih Dosen --</option>
                <?php foreach ($daftarDosen as $d): ?>
                    <option value="<?= $d['id']; ?>" <?= isset($matakuliah) && $matakuliah['dosen_id']==$d['id'] ? 'selected' : '' ?>>
                        <?= esc($d['nama']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Tombol Aksi -->
        <div class="flex items-center justify-between mt-6">
            <button type="submit"
                    class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition">
                Simpan
            </button>
            <a href="/admin/matakuliah"
               class="text-gray-600 hover:text-gray-900 hover:underline">
                Batal
            </a>
        </div>

    </form>
</div>

</body>
</html>
