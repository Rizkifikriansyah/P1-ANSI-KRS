<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= isset($jadwal) ? 'Edit' : 'Tambah' ?> Jadwal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-6">

<div class="w-full max-w-2xl bg-white shadow-xl rounded-lg p-8">
    <h2 class="text-2xl font-bold text-center mb-6 text-blue-700">
        <?= isset($jadwal) ? 'Edit' : 'Tambah' ?> Jadwal
    </h2>

    <form action="<?= isset($jadwal) ? '/admin/jadwal/update/' . $jadwal['id'] : '/admin/jadwal/simpan' ?>" method="post" class="space-y-5">

        <div>
            <label for="matakuliah_id" class="block text-sm font-medium text-gray-700 mb-1">Mata Kuliah</label>
            <select id="matakuliah_id" name="matakuliah_id" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
                <option value="">-- Pilih Mata Kuliah --</option>
                <?php foreach ($matakuliah as $mk): ?>
                    <option value="<?= $mk['id'] ?>" <?= old('matakuliah_id', $jadwal['matakuliah_id'] ?? '') == $mk['id'] ? 'selected' : '' ?>>
                        <?= $mk['nama'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <label for="dosen_id" class="block text-sm font-medium text-gray-700 mb-1">Dosen</label>
            <select id="dosen_id" name="dosen_id" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
                <option value="">-- Pilih Dosen --</option>
                <?php foreach ($dosen as $d): ?>
                    <option value="<?= $d['id'] ?>" <?= old('dosen_id', $jadwal['dosen_id'] ?? '') == $d['id'] ? 'selected' : '' ?>>
                        <?= $d['nama'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <label for="kelas" class="block text-sm font-medium text-gray-700 mb-1">Kelas</label>
            <input type="text" id="kelas" name="kelas" value="<?= old('kelas', $jadwal['kelas'] ?? '') ?>" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300"
                placeholder="Contoh: A, B, C">
        </div>

        <div>
            <label for="ruang" class="block text-sm font-medium text-gray-700 mb-1">Ruang</label>
            <input type="text" id="ruang" name="ruang" value="<?= old('ruang', $jadwal['ruang'] ?? '') ?>" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300"
                placeholder="Contoh: R101, Lab 2, dll.">
        </div>

        <div>
            <label for="hari" class="block text-sm font-medium text-gray-700 mb-1">Hari</label>
            <select id="hari" name="hari" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
                <option value="">-- Pilih Hari --</option>
                <?php
                $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                foreach ($hariList as $h): ?>
                    <option value="<?= $h ?>" <?= old('hari', $jadwal['hari'] ?? '') == $h ? 'selected' : '' ?>>
                        <?= $h ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <label for="waktu" class="block text-sm font-medium text-gray-700 mb-1">Waktu (contoh: 08.00 - 10.00)</label>
            <input type="text" id="waktu" name="waktu" value="<?= old('waktu', $jadwal['waktu'] ?? '') ?>" required
                placeholder="08.00 - 10.00"
                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
        </div>


        <div class="flex justify-end">
            <a href="/admin/jadwal" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 mr-2">Batal</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                Simpan
            </button>
        </div>

    </form>
</div>

</body>
</html>
