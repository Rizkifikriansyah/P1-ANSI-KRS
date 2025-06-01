<nav class="bg-blue-600 text-white shadow">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 flex justify-between items-center">
    
    <!-- Kiri: Logo + Nama Universitas -->
    <div class="flex items-center space-x-3">
      <img src="<?= base_url('image/umb.jpeg') ?>" alt="Logo Kampus" class="w-8 h-8 rounded-full">
      <a href="/" class="text-lg font-semibold hover:text-yellow-300">Universitas Muhammadiyah Bima</a>
    </div>

    <!-- Kanan: Navigasi -->
    <div class="space-x-4">
      <a href="<?= base_url('/krs') ?>" class="hover:underline">Isi KRS</a>
      <a href="<?= base_url('/krs/cetak') ?>" class="hover:underline">Cetak KRS</a>
      <a href="<?= base_url('/logout') ?>" class="bg-red-500 px-3 py-1 rounded hover:bg-red-600">Logout</a>
    </div>

  </div>
</nav>