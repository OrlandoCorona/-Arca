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
  <title>Menú — El Arca</title>
  <link rel="stylesheet" href="/assets/css/styles.css">
</head>

<body>

  <!-- NAVBAR -->
  <?php require __DIR__ . '/partials/navbar.php'; ?>

  <!-- CONTENIDO -->
  <main class="app-container menu-page">

    <!-- BOTÓN VOLVER -->
    <button class="btn-back" onclick="history.back()">← Volver</button>

    <!-- HEADER -->
    <section class="menu-section">
      <header class="menu-header">
        <h1>Menú</h1>
        <p>Selecciona una categoría para explorar nuestros productos</p>
      </header>

      <!-- GRID DE CATEGORÍAS -->
      <div class="menu-grid">

        <!-- COMIDA -->
        <a href="/?view=food" class="menu-card">
          <div class="menu-media">
            <img src="/assets/images/inicio1.jpg" alt="Comida">
          </div>
          <div class="menu-body">
            <h3>Comida</h3>
            <p>Platillos preparados al momento</p>
          </div>
        </a>

        <!-- CERVEZAS -->
        <a href="/?view=beers" class="menu-card">
          <div class="menu-media">
            <img src="/assets/images/inicio5.jpg" alt="Cervezas">
          </div>
          <div class="menu-body">
            <h3>Cervezas</h3>
            <p>Selección bien fría</p>
          </div>
        </a>

        <!-- MICHELADAS -->
        <a href="/?view=micheladas" class="menu-card">
          <div class="menu-media">
            <img src="/assets/images/inicio6.jpg" alt="Micheladas">
          </div>
          <div class="menu-body">
            <h3>Micheladas</h3>
            <p>Clásicas y especiales</p>
          </div>
        </a>

        <!-- TACOS -->
        <a href="/?view=tacos" class="menu-card">
          <div class="menu-media">
            <img src="/assets/images/inicio3.jpg" alt="Tacos">
          </div>
          <div class="menu-body">
            <h3>Tacos</h3>
            <p>Sabores tradicionales</p>
          </div>
        </a>

        <!-- BOTELLAS -->
        <a href="/?view=bottles" class="menu-card">
          <div class="menu-media">
            <img src="/assets/images/inicio8.jpg" alt="Botellas">
          </div>
          <div class="menu-body">
            <h3>Botellas</h3>
            <p>Para compartir</p>
          </div>
        </a>

        <!-- EXTRAS -->
        <a href="/?view=extras" class="menu-card">
          <div class="menu-media">
            <img src="/assets/images/inicio2.jpg" alt="Extras">
          </div>
          <div class="menu-body">
            <h3>Extras</h3>
            <p>Complementos y adicionales</p>
          </div>
        </a>

      </div>
    </section>

  </main>

  <!-- FOOTER -->
  <footer class="site-footer">
    <div class="footer-inner">
      <img src="/assets/images/iconoB.jpg" alt="El Arca" class="footer-logo">
      <p class="footer-text">© 2024 Restaurante Bar El Arca</p>
    </div>
  </footer>

  <script src="/assets/js/script.js"></script>
</body>
</html>
