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
  <title>Micheladas — El Arca</title>
  <link rel="stylesheet" href="/assets/css/styles.css">
</head>

<body>

  <?php require __DIR__ . '/partials/navbar.php'; ?>

  <main class="app-container product-page">

    <button class="btn-back" onclick="history.back()">← Volver</button>

    <section class="menu-section">

      <header class="menu-header">
        <h1>Micheladas</h1>
        <p>Refrescantes, preparadas al momento</p>
      </header>

      <div class="menu-grid">

        <article class="menu-card">
          <div class="menu-media">
            <img src="/assets/images/inicio5.jpg" alt="Michelada clásica">
          </div>
          <div class="menu-body">
            <h3>Michelada Clásica</h3>
            <p>Limón, sal y salsas tradicionales.</p>
            <span class="menu-price">$75</span>
          </div>
        </article>

      </div>

    </section>
  </main>

  <!-- FOOTER GLOBAL -->
  <footer class="site-footer">
    <div class="footer-inner">
      <img src="/assets/images/iconoB.jpg" alt="El Arca" class="footer-logo">
      <p class="footer-text">© 2024 Restaurante Bar El Arca</p>
    </div>
  </footer>

</body>
</html>
