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
<link rel="stylesheet" href="/assets/css/styles.css?v=2025-01">
</head>

<body>

  <!-- NAVBAR -->
  <?php require __DIR__ . '/partials/navbar.php'; ?>

  <!-- CONTENIDO -->
  <main class="app-container section">

    <button class="btn-back" onclick="history.back()">← Volver</button>

    <header class="section-header">
      <h2>Mi Perfil</h2>
      <p>Información de tu cuenta y reservaciones</p>
    </header>

    <!-- CARD PERFIL -->
    <div class="intro-grid">

      <article class="intro-card">

        <div class="auth-logo-wrapper">
          <img
            src="/assets/images/logo-footer.jpg"
            alt="Usuario El Arca"
            class="auth-logo"
          >
        </div>

        <p><strong>Nombre:</strong><br><?= htmlspecialchars($usuario['nombre']) ?></p>
        <p><strong>Correo:</strong><br><?= htmlspecialchars($usuario['correo']) ?></p>

      </article>

    </div>

    <!-- RESERVACIONES -->
    <section class="section">

      <header class="section-header">
        <h2>Mis Reservaciones</h2>
      </header>

      <?php if (empty($reservaciones)): ?>
        <p class="empty-state">No tienes reservaciones registradas.</p>
      <?php else: ?>

        <div class="menu-grid">
          <?php foreach ($reservaciones as $reserva): ?>
            <article class="menu-card">
              <div class="menu-body">
                <p><strong>Fecha:</strong> <?= htmlspecialchars($reserva['fecha']) ?></p>
                <p><strong>Hora:</strong> <?= htmlspecialchars($reserva['hora']) ?></p>
                <p><strong>Zona:</strong> <?= htmlspecialchars($reserva['zona']) ?></p>
              </div>
            </article>
          <?php endforeach; ?>
        </div>

      <?php endif; ?>

    </section>

  </main>

  <!-- FOOTER -->
  <footer class="site-footer">
    <div class="footer-inner">
      <img src="/assets/images/iconoB.jpg" alt="El Arca" class="footer-logo">
      <p class="footer-text">© 2024 Restaurante Bar El Arca</p>
    </div>
  </footer>

  
</body>
</html>
