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
  <title>Reservaciones — El Arca</title>
  <link rel="stylesheet" href="/assets/css/styles.css">
</head>

<body>

  <?php require __DIR__ . '/partials/navbar.php'; ?>

  <main class="app-container section">

    <header class="section-header">
      <h2>Reservaciones</h2>
      <p>Reserva tu mesa fácilmente</p>
    </header>

    <div class="intro-grid">

      <article class="intro-card">
        <form method="POST" action="/?action=realizar_reserva">

          <div class="form-group">
            <input
              type="date"
              name="fecha"
              required
            >
            <label>Fecha</label>
          </div>

          <div class="form-group">
            <input
              type="time"
              name="hora"
              required
            >
            <label>Hora</label>
          </div>

          <div class="form-group">
            <input
              type="number"
              name="zona"
              min="1"
              max="20"
              required
            >
            <label>Número de personas</label>
          </div>

          <button type="submit" class="btn btn-animated">
            <span class="text">Confirmar reservación</span>
          </button>

        </form>
      </article>

    </div>

  </main>

  <footer class="site-footer">
    <div class="footer-inner">
      <img src="/assets/images/iconoB.jpg" alt="El Arca" class="footer-logo">
      <p class="footer-text">© 2024 Restaurante Bar El Arca</p>
    </div>
  </footer>

</body>
</html>
