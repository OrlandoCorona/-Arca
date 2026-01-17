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
  <link
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    rel="stylesheet" />
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

    <!-- CHIPS / CATEGORÍAS (Horizontal) -->
    <section class="chips-container">
      <a href="/?view=menu" class="chip active">Todo</a>
      <a href="/?view=beers" class="chip">Bebidas</a>
      <a href="/?view=food" class="chip">Comida</a>
      <a href="/?view=micheladas" class="chip">Micheladas</a>
      <a href="/?view=postres" class="chip">Postres</a>
    </section>

    <!-- GRID DE CATEGORÍAS (New Vertical Style) -->
    <section class="menu-page-grid">

      <!-- BEBIDAS -->
      <a href="/?view=beers" class="menu-category-card">
        <div class="menu-category-bg" style="background-image: url('/assets/images/arca-iris.jpg');"></div>
        <div class="menu-category-overlay"></div>
        <div class="menu-category-arrow">
          <span class="material-symbols-outlined">arrow_forward</span>
        </div>
        <div class="menu-category-content">
          <span
            class="inline-block px-2 py-1 bg-primary text-background-dark text-[10px] font-bold uppercase rounded mb-2"
            style="font-size: 0.6rem; padding: 2px 6px; border-radius: 4px; background: var(--primary); color: var(--bg-dark); font-weight: 700;">Popular</span>
          <h3 class="menu-category-title">Bebidas</h3>
          <p class="menu-category-subtitle">CERVEZAS Y COPEO</p>
        </div>
      </a>

      <!-- MICHELADAS -->
      <a href="/?view=micheladas" class="menu-category-card">
        <div class="menu-category-bg" style="background-image: url('/assets/images/micheladas-inicio.png');"></div>
        <div class="menu-category-overlay"></div>
        <div class="menu-category-arrow">
          <span class="material-symbols-outlined">arrow_forward</span>
        </div>
        <div class="menu-category-content">
          <h3 class="menu-category-title">Micheladas</h3>
          <p class="menu-category-subtitle">ESPECIALIDAD DE LA CASA</p>
        </div>
      </a>

      <!-- COMIDA -->
      <a href="/?view=food" class="menu-category-card">
        <div class="menu-category-bg" style="background-image: url('/assets/images/tacos-asada-inicio.png');"></div>
        <div class="menu-category-overlay"></div>
        <div class="menu-category-arrow">
          <span class="material-symbols-outlined">arrow_forward</span>
        </div>
        <div class="menu-category-content">
          <h3 class="menu-category-title">Comida</h3>
          <p class="menu-category-subtitle">TACOS Y ANTOJITOS</p>
        </div>
      </a>

      <!-- SNACKS (Adding Snacks to match existing files) -->
      <a href="/?view=snacks" class="menu-category-card">
        <div class="menu-category-bg" style="background-image: url('/assets/images/papas.jpg');"></div>
        <!-- Placeholder image path guess, or use generic -->
        <div class="menu-category-overlay"></div>
        <div class="menu-category-arrow">
          <span class="material-symbols-outlined">arrow_forward</span>
        </div>
        <div class="menu-category-content">
          <h3 class="menu-category-title">Snacks</h3>
          <p class="menu-category-subtitle">PARA COMPARTIR</p>
        </div>
      </a>

    </section>

  </main>

  <!-- iOS Bottom Navigation -->
  <nav class="bottom-nav">
    <a href="/?view=home" class="nav-item">
      <span class="material-symbols-outlined">home</span>
      <span>Inicio</span>
    </a>
    <a href="/?view=menu" class="nav-item active">
      <span class="material-symbols-outlined">menu_book</span>
      <span>Menú</span>
    </a>
    <a href="/?view=galeria" class="nav-item">
      <span class="material-symbols-outlined">gallery_thumbnail</span>
      <span>Galería</span>
    </a>
    <a href="/?view=reservaciones" class="nav-item">
      <span class="material-symbols-outlined">calendar_today</span>
      <span>Reservas</span>
    </a>
  </nav>

  <!-- FOOTER -->
  <footer class="site-footer">
    <div class="footer-inner">
      <img src="/assets/images/iconoB.jpg" alt="El Arca" class="footer-logo">
      <p class="footer-text">© 2024 Restaurante Bar El Arca</p>
    </div>
  </footer>

</body>

</html>