<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login KRS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?= base_url('css/style.css?v=1.0.6') ?>">
  
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
</head>

<body class="bg-gradient-primary d-flex justify-content-center align-items-center vh-100">

<div id="login-card" class="card shadow p-4 border-0" style="min-width: 360px; animation: fadeIn 0.8s ease-out;">
  <h4 class="mb-4 text-center text-primary fw-bold">🔐 Login Sistem KRS</h4>

  <?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
  <?php endif; ?>

  <form action="<?= base_url('/auth/login') ?>" method="post" id="loginForm">
    <div class="mb-3">
      <label for="username" class="form-label">👤 Username</label>
      <input type="text" name="username" id="username" class="form-control" required autofocus>
    </div>
    
    <div class="mb-3">
      <label for="password" class="form-label">🔑 Password</label>
      <input type="password" name="password" id="password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary w-100">Masuk</button>
  </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- JS Animation -->
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
