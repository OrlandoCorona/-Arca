<?php
declare(strict_types=1);

if (!isset($_SESSION['id_usuario'])) {
  header('Location: /?view=login');
  exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mi Perfil — El Arca</title>
  <link rel="stylesheet" href="/assets/css/styles.css">
</head>

<body>

  <!-- NAVBAR -->
  <?php require __DIR__ . '/partials/navbar.php'; ?>

  <!-- CONTENIDO PRINCIPAL -->
  <main class="app-container">

    <section class="profile-section">

      <button class="btn-back" onclick="history.back()">← Volver</button>

      <header class="profile-header">
        <h1>Mi perfil</h1>
        <p>Información de tu cuenta</p>
      </header>

      <div class="profile-card">

        <div class="profile-avatar">
          <img src="/assets/images/inconoB.jpg" alt="Usuario El Arca">
        </div>

        <div class="profile-info">
          <p><strong>Nombre:</strong> <?= htmlspecialchars($_SESSION['nombre'] ?? '—') ?></p>
          <p><strong>Correo:</strong> <?= htmlspecialchars($_SESSION['correo'] ?? '—') ?></p>
        </div>

      </div>

    </section>

  </main>

  <!-- FOOTER -->
  <footer class="site-footer">
    <img src="/assets/images/inconoB.jpg" alt="El Arca">
    <p>© 2024 Restaurante Bar El Arca</p>
  </footer>

  <!-- SCRIPTS -->
  <script src="/assets/js/script.js"></script>
</body>
</html>
