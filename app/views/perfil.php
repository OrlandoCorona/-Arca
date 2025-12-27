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

  <!-- CONTENIDO -->
  <main class="app-container">

    <button class="btn-back" onclick="history.back()">← Volver</button>

    <section class="profile-section">

      <header class="profile-header">
        <h1>Mi Perfil</h1>
        <p>Información de tu cuenta y reservaciones</p>
      </header>

      <!-- DATOS DEL USUARIO -->
      <div class="profile-card">

        <div class="profile-avatar">
          <img src="/assets/images/inconoB.jpg" alt="Usuario El Arca">
        </div>

        <div class="profile-info">
          <p><strong>Nombre:</strong> <?= htmlspecialchars($usuario['nombre']) ?></p>
          <p><strong>Correo:</strong> <?= htmlspecialchars($usuario['correo']) ?></p>
        </div>

      </div>

      <!-- RESERVACIONES -->
      <section class="profile-reservations">
        <h2>Mis Reservaciones</h2>

        <?php if (empty($reservaciones)): ?>
          <p class="empty-state">No tienes reservaciones registradas.</p>
        <?php else: ?>
          <?php foreach ($reservaciones as $reserva): ?>
            <div class="reserva">
              <p><strong>Fecha:</strong> <?= htmlspecialchars($reserva['fecha']) ?></p>
              <p><strong>Hora:</strong> <?= htmlspecialchars($reserva['hora']) ?></p>
              <p><strong>Zona:</strong> <?= htmlspecialchars($reserva['zona']) ?></p>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </section>

    </section>

  </main>

  <!-- FOOTER -->
<footer class="site-footer">
  <div class="footer-inner">
    <img src="/assets/images/iconoB.jpg" alt="El Arca" class="footer-logo">
    <p class="footer-text">© 2024 Restaurante Bar El Arca</p>
  </div>
</footer>


  <!-- SCRIPTS -->
  <script src="/assets/js/script.js"></script>
</body>
</html>
