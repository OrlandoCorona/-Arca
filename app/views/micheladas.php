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

  <!-- VOLVER -->
  <div class="menu-back">
    <button class="btn-back" onclick="history.back()">← Volver</button>
  </div>

  <section class="menu-section">
    <header class="menu-header">
      <h1>Micheladas</h1>
      <p>Refrescantes, preparadas al momento</p>
    </header>

    <!-- GRID DE PRODUCTOS -->
    <div class="menu-grid">

      <article class="product-card">
        <div class="menu-media">
          <img src="/assets/images/inicio5.jpg" alt="Michelada clásica">
        </div>

        <div class="product-body">
          <h3>Michelada Clásica</h3>
          <p>La tradicional con limón, sal y salsas.</p>

          <div class="product-footer">
            <span class="menu-price">$75</span>
            <button class="btn product-btn">Añadir</button>
          </div>
        </div>
      </article>

      <!-- Aquí pueden ir más productos -->

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
