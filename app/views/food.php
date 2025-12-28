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
  <title>Comida — El Arca</title>
  <link rel="stylesheet" href="/assets/css/styles.css">
</head>

<body>

  <!-- NAVBAR -->
  <?php require __DIR__ . '/partials/navbar.php'; ?>

  <main class="app-container menu-page">

    <!-- VOLVER -->
    <button class="btn-back" onclick="history.back()">← Volver</button>

    <!-- HEADER -->
    <header class="menu-header">
      <h1>Comida</h1>
      <p>Elige una categoría</p>
    </header>

    <!-- GRID DE CATEGORÍAS -->
    <section class="menu-grid">

      <!-- TACOS -->
      <a href="/?view=tacos" class="menu-card">
        <div class="menu-media">
          <img src="/assets/images/tacos-asada-inicio.png" alt="Tacos">
        </div>
        <div class="menu-body">
          <h3>Tacos</h3>
          <p>Preparados al momento con recetas tradicionales</p>
        </div>
      </a>

      <!-- EXTRAS -->
      <a href="/?view=extras" class="menu-card">
        <div class="menu-media">
          <img src="/assets/images/extras-inicio.png" alt="Extras">
        </div>
        <div class="menu-body">
          <h3>Extras</h3>
          <p>Complementos para acompañar tus platillos</p>
        </div>
      </a>

      <!-- ESPECIALIDADES removed: view not present -->

      <!-- POSTRES -->
      <a href="/?view=postres" class="menu-card">
        <div class="menu-media">
          <img src="/assets/images/postres-inicio.png" alt="Postres">
        </div>
        <div class="menu-body">
          <h3>Postres</h3>
          <p>El toque dulce para cerrar tu experiencia</p>
        </div>
      </a>

      <!-- SNACKS -->
      <a href="/?view=snacks" class="menu-card">
        <div class="menu-media">
          <img src="/assets/images/snacks-inicio.png" alt="Snacks">
        </div>
        <div class="menu-body">
          <h3>Snacks</h3>
          <p>Opciones ligeras para compartir</p>
        </div>
      </a>

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
