<?= $this->include('layout/template1') ?>
<?= $this->section('content') ?>

<div class="max-w-7xl mx-auto px-4 py-6">
  <div class="absolute inset-0 opacity-10 bg-no-repeat bg-center bg-contain pointer-events-none"
    style="background-image: url('<?= base_url('image/umb.jpeg') ?>'); background-size: 550px;"></div>

  <div class="relative z-10">
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
      <h4 class="text-xl font-bold">Halo, <?= esc(session()->get('name')) ?> (Mahasiswa)</h4>
    </div>

    <h2 class="text-2xl font-bold mb-2"><?= $title ?? 'Dashboard Mahasiswa' ?></h2>
    <p class="mb-4"><?= $message ?? 'Selamat datang di sistem KRS mahasiswa.' ?></p>

    <a href="<?= base_url('/krs') ?>" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-4">+ Mulai Isi KRS</a>

    <!-- KRS Saat Ini -->
    <h3 class="text-xl font-semibold mb-3">
      KRS Aktif (<?= esc($tahun_ajaran) ?> - Semester <?= ucfirst($semester) ?>)
    </h3>

    <?php if (!empty($krsSekarang)): ?>
    <div class="overflow-x-auto bg-white rounded shadow mb-8">
      <table class="min-w-full divide-y divide-gray-200 text-sm">
        <thead class="bg-gray-100">
          <tr>
            <th class="px-4 py-2 text-left font-medium text-gray-700">Kode</th>
            <th class="px-4 py-2 text-left font-medium text-gray-700">Nama</th>
            <th class="px-4 py-2 text-left font-medium text-gray-700">SKS</th>
            <th class="px-4 py-2 text-left font-medium text-gray-700">Status</th>
            <th class="px-4 py-2 text-left font-medium text-gray-700">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          <?php foreach ($krsSekarang as $mk): ?>
          <tr>
            <td class="px-4 py-2"><?= esc($mk['kode']) ?></td>
            <td class="px-4 py-2"><?= esc($mk['nama']) ?></td>
            <td class="px-4 py-2"><?= esc($mk['sks']) ?></td>
            <td class="px-4 py-2">
              <?php if ($mk['is_approved']): ?>
                <span class="text-green-600 text-sm">Disetujui</span>
              <?php else: ?>
                <span class="text-red-600 text-sm">Belum Disetujui</span>
              <?php endif; ?>
            </td>
            <td class="px-4 py-2">
              <?php if (!$mk['is_approved']): ?>
              <form action="<?= base_url('/krs/hapus/' . $mk['krs_id']) ?>" method="post" onsubmit="return confirm('Yakin hapus?')">
                <button type="submit" class="text-red-600 hover:underline text-sm">Hapus</button>
              </form>
              <?php else: ?>
                <span class="text-gray-400 text-sm">Terkunci</span>
              <?php endif; ?>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <?php else: ?>
    <div class="bg-yellow-100 text-yellow-700 p-4 rounded mb-8">
      Anda belum mengisi KRS untuk semester <strong><?= esc($semester) ?></strong> tahun ajaran <strong><?= esc($tahun_ajaran) ?></strong>.
    </div>
    <?php endif; ?>

    <!-- Riwayat KRS -->
    <h2 class="text-xl font-semibold mt-10 mb-4">Riwayat KRS Sebelumnya</h2>

    <?php if (!empty($riwayat)): ?>
      <?php foreach ($riwayat as $semesterRiwayat => $matkul): ?>
        <div class="mb-6 border rounded shadow-sm">
          <div class="bg-gray-100 px-4 py-2 font-semibold text-gray-800"><?= esc($semesterRiwayat) ?></div>
          <div class="p-4 overflow-x-auto">
            <table class="w-full text-sm border border-gray-200">
              <thead class="bg-gray-200 text-gray-700">
                <tr>
                  <th class="px-2 py-1 border">Kode</th>
                  <th class="px-2 py-1 border">Nama</th>
                  <th class="px-2 py-1 border">SKS</th>
                  <th class="px-2 py-1 border">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($matkul as $mk): ?>
                <tr class="hover:bg-gray-50">
                  <td class="px-2 py-1 border"><?= esc($mk['kode']) ?></td>
                  <td class="px-2 py-1 border"><?= esc($mk['nama']) ?></td>
                  <td class="px-2 py-1 border"><?= esc($mk['sks']) ?></td>
                  <td class="px-2 py-1 border text-center">
                    <?php if ($mk['is_approved']): ?>
                      <span class="text-green-600 font-medium">Disetujui</span>
                    <?php else: ?>
                      <span class="text-red-500 font-medium">Belum Disetujui</span>
                    <?php endif; ?>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p class="text-gray-500">Belum ada riwayat KRS yang tersedia.</p>
    <?php endif; ?>
  </div>
</div>
