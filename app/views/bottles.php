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
  <title>Botellas — El Arca</title>
  <link rel="stylesheet" href="/assets/css/styles.css">
</head>

<body>

<?php require __DIR__ . '/partials/navbar.php'; ?>

<main class="app-container">

  <section class="menu-section">

    <button class="btn-back" onclick="history.back()">← Volver</button>

    <header class="menu-header">
      <h1>Botellas</h1>
      <p>Selección de botellas para compartir</p>
    </header>

    <div class="menu-grid">

      <article class="menu-card">
        <div class="menu-media">
          <img src="/assets/images/inicio8.jpg" alt="Botella premium">
        </div>
        <div class="menu-body">
          <h3>Botella Premium</h3>
          <p>Sabor intenso y calidad garantizada.</p>
          <span class="menu-price">$950</span>
        </div>
      </article>

      <article class="menu-card">
        <div class="menu-media">
          <img src="/assets/images/inicio9.jpg" alt="Botella especial">
        </div>
        <div class="menu-body">
          <h3>Botella Especial</h3>
          <p>Ideal para celebraciones.</p>
          <span class="menu-price">$1,200</span>
        </div>
      </article>

    </div>
  </section>

</main>

<footer class="site-footer">
  <img src="/assets/images/inconoB.jpg" alt="El Arca">
  <p>© 2024 Restaurante Bar El Arca</p>
</footer>

<script src="/assets/js/script.js"></script>
</body>
</html>
