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
  <link rel="stylesheet" href="/assets/css/styles.css?v=2025-01">
</head>

<body>

  <!-- NAVBAR -->
  <?php require __DIR__ . '/partials/navbar.php'; ?>

  <!-- CONTENIDO -->
  <main class="app-container menu-page">

    <!-- VOLVER -->
    <button class="btn-back" onclick="history.back()">← Volver</button>

    <!-- HEADER -->
    <header class="menu-header">
      <h1>Nuestro Menú</h1>
      <p>Descubre nuestras categorías</p>
    </header>

    <!-- GRID DE CATEGORÍAS -->
    <section class="menu-grid">

      <!-- BEBIDAS -->
      <a href="/?view=beers" class="menu-card">
        <div class="menu-media">
          <img src="/assets/images/arca-iris.jpg" alt="Bebidas y copeo">
        </div>
        <div class="menu-body">
          <h3>Bebidas</h3>
          <p>Cervezas, botellas y copeo</p>
        </div>
      </a>

      <!-- MICHELADAS -->
      <a href="/?view=micheladas" class="menu-card">
        <div class="menu-media">
          <img src="/assets/images/micheladas-inicio.png" alt="Micheladas">
        </div>
        <div class="menu-body">
          <h3>Micheladas</h3>
          <p>Nuestras especialidades refrescantes</p>
        </div>
      </a>

      <!-- COMIDA -->
      <a href="/?view=food" class="menu-card">
        <div class="menu-media">
          <img src="/assets/images/tacos-asada-inicio.png" alt="Comida">
        </div>
        <div class="menu-body">
          <h3>Comida</h3>
          <p>Tacos y platillos preparados al momento</p>
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
