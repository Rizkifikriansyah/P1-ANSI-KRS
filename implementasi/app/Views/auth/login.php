<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login KRS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Google Font: Inter -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Inter', sans-serif;
    }

    @keyframes scaleDown {
      0% { transform: scale(1); opacity: 1; }
      100% { transform: scale(0.95); opacity: 0.7; }
    }

    .scale-down {
      animation: scaleDown 0.4s ease-out forwards;
    }
  </style>
</head>

<body class="bg-gradient-to-tr from-blue-600 via-indigo-700 to-purple-700 min-h-screen flex items-center justify-center">

  <div id="login-card" class="bg-white shadow-xl rounded-xl p-8 w-full max-w-sm animate-fadeIn">
    <h2 class="text-2xl font-semibold text-center text-indigo-700 mb-6">🔐 Login Sistem KRS</h2>

    <?php if(session()->getFlashdata('error')): ?>
      <div class="bg-red-100 border border-red-300 text-red-700 text-sm p-3 rounded mb-4">
        <?= session()->getFlashdata('error') ?>
      </div>
    <?php endif; ?>

    <form action="<?= base_url('/auth/login') ?>" method="post" id="loginForm" class="space-y-4">
      <div>
        <label for="username" class="block text-sm font-medium text-gray-700 mb-1">👤 Username</label>
        <input type="text" name="username" id="username" class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required autofocus>
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">🔑 Password</label>
        <input type="password" name="password" id="password" class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
      </div>

      <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 rounded-lg transition duration-150">
        Masuk
      </button>
    </form>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const form = document.getElementById('loginForm');
      form.addEventListener('submit', function () {
        const card = document.getElementById('login-card');
        card.classList.add('scale-down');
      });
    });
  </script>

</body>
</html>
