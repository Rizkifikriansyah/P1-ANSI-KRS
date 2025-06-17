<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#2563eb',
          }
        }
      }
    }
  </script>
</head>
<body class="bg-gray-100 min-h-screen">

<!-- Navbar -->
<nav class="bg-primary text-white shadow">
  <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
    <div class="flex items-center space-x-3">
      <img src="<?= base_url('image/umb.jpeg') ?>" alt="Logo Kampus" class="w-8 h-8 rounded-full">
      <a href="/" class="text-lg font-semibold hover:text-yellow-300">Universitas Muhammadiyah Bima</a>
    </div>
    <div class="flex items-center gap-3">
      <span class="text-sm hidden sm:inline">👤 <?= esc(session()->get('name')) ?> (Admin)</span>
      <a href="/logout" class="bg-white text-primary px-3 py-1 rounded text-sm hover:bg-gray-100">Logout</a>
    </div>
  </div>
</nav>

<!-- Content -->
<div class="max-w-6xl mx-auto px-4 py-10">
  <div class="bg-white shadow rounded-lg p-6">
    <h2 class="text-2xl font-bold text-primary mb-2">Dashboard Admin</h2>
    <p class="text-gray-700">Selamat datang, <strong><?= esc(session()->get('name')) ?></strong>!</p>
    <p class="text-sm text-gray-500">Gunakan menu di atas untuk mengelola data akademik seperti mahasiswa, dosen, mata kuliah, dan jadwal.</p>

    <hr class="my-6">

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-4">
      <a href="/admin/mahasiswa" class="bg-gray-50 hover:bg-gray-100 rounded-lg shadow p-6 transition">
        <h3 class="text-xl font-semibold text-blue-700 mb-1">🎓 Mahasiswa</h3>
        <p class="text-sm text-gray-600">Lihat dan kelola data mahasiswa.</p>
      </a>

      <a href="/admin/dosen" class="bg-gray-50 hover:bg-gray-100 rounded-lg shadow p-6 transition">
        <h3 class="text-xl font-semibold text-blue-700 mb-1">👨‍🏫 Dosen</h3>
        <p class="text-sm text-gray-600">Kelola informasi dosen.</p>
      </a>

      <a href="/admin/matakuliah" class="bg-gray-50 hover:bg-gray-100 rounded-lg shadow p-6 transition">
        <h3 class="text-xl font-semibold text-blue-700 mb-1">📘 Mata Kuliah</h3>
        <p class="text-sm text-gray-600">Atur data mata kuliah.</p>
      </a>

      <a href="/admin/jadwal" class="bg-gray-50 hover:bg-gray-100 rounded-lg shadow p-6 transition">
        <h3 class="text-xl font-semibold text-blue-700 mb-1">📅 Jadwal</h3>
        <p class="text-sm text-gray-600">Atur jadwal kuliah per kelas dan semester.</p>
      </a>
    </div>
  </div>
</div>

</body>
</html>
