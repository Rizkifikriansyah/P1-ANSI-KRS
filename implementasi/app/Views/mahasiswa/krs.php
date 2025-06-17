<?= $this->extend('layout/template1') ?>
<?= $this->section('content') ?>

<div class="max-w-4xl mx-auto mt-10 px-4">
    <h3 class="text-2xl font-semibold mb-6">Isi Kartu Rencana Studi (KRS)</h3>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="bg-red-100 text-red-800 p-3 rounded mb-4"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <!-- ✅ Form Pencarian DIPISAH -->
    <form action="<?= base_url('/krs') ?>" method="get" class="mb-4">
        <input type="text" name="keyword" placeholder="Cari kode atau nama matakuliah" value="<?= esc($keyword ?? '') ?>"
            class="border px-3 py-2 rounded w-full sm:w-1/2 mb-2">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Cari</button>
    </form>

    <!-- ✅ Form Simpan KRS -->
    <form action="<?= base_url('/krs/store') ?>" method="post" class="space-y-5">
        <?= csrf_field() ?>

        <!-- TABEL MATAKULIAH -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Mata Kuliah</label>
            <div class="overflow-x-auto">
                <table class="w-full table-auto border border-gray-200 text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-2 border">Pilih</th>
                            <th class="p-2 border">Kode</th>
                            <th class="p-2 border">Nama</th>
                            <th class="p-2 border">SKS</th>
                            <th class="p-2 border">Kelas</th>
                            <th class="p-2 border">Semester</th>
                            <th class="p-2 border">Tahun Ajaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($matakuliah_paginated as $mk): ?>
                            <tr class="hover:bg-gray-50">
                                <td class="text-center border p-2">
                                  <input type="checkbox" name="jadwal_id[]" value="<?= $mk['jadwal_id'] ?>"
                                        <?= in_array($mk['jadwal_id'], $krs_jadwal_ids ?? []) ? 'checked' : '' ?>>

                                </td>
                                <td class="border p-2"><?= esc($mk['kode']) ?></td>
                                <td class="border p-2"><?= esc($mk['nama']) ?></td>
                                <td class="border p-2"><?= esc($mk['sks']) ?></td>
                                <td class="border p-2"><?= esc($mk['kelas'] ?? '-') ?></td>
                                <td class="border p-2 capitalize"><?= esc($mk['semester'] ?? '-') ?></td>
                                <td class="border p-2"><?= esc($mk['tahun_ajaran'] ?? '-') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <?php if ($total_pages > 1): ?>
                <div class="mt-4 flex justify-center space-x-2">
                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <a href="?page=<?= $i ?>&keyword=<?= esc($keyword ?? '') ?>"
                           class="px-3 py-1 border rounded <?= $i == $current_page ? 'bg-blue-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-100' ?>">
                            <?= $i ?>
                        </a>
                    <?php endfor; ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="flex space-x-2 mt-4">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Simpan KRS</button>
            <a href="<?= base_url('/dashboard/mahasiswa') ?>" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Kembali</a>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
