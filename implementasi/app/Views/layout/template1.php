<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $title ?? 'Sistem KRS' ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

  <!-- Navbar -->
  <?= $this->include('layout/navbar') ?>

  <!-- Konten Halaman -->
  <?= $this->renderSection('content') ?>

</body>
</html>
