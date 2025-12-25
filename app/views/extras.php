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
  <title>Extras — El Arca</title>
  <link rel="stylesheet" href="/assets/css/styles.css">
</head>

<body>

  <?php require __DIR__ . '/partials/navbar.php'; ?>


  <main class="app-container">

    <!-- Botón volver -->
    <div class="section-top">
      <button class="btn-back" onclick="history.back()">← Volver</button>
    </div>

    <section class="menu-section">
      <header class="menu-header">
        <h1>Extras</h1>
        <p>Complementos para personalizar tu experiencia</p>
      </header>

      <div class="menu-grid">

        <article class="menu-card">
          <div class="menu-media">
            <img src="/assets/images/inicio2.jpg" alt="Guacamole">
          </div>
          <div class="menu-body">
            <h3>Guacamole</h3>
            <p>Preparado al momento con aguacate fresco.</p>
            <span class="menu-price">$60</span>
          </div>
        </article>

        <article class="menu-card">
          <div class="menu-media">
            <img src="/assets/images/inicio3.jpg" alt="Papas">
          </div>
          <div class="menu-body">
            <h3>Papas a la Francesa</h3>
            <p>Crujientes y perfectas para acompañar.</p>
            <span class="menu-price">$50</span>
          </div>
        </article>

        <article class="menu-card">
          <div class="menu-media">
            <img src="/assets/images/inicio1.jpg" alt="Salsas extra">
          </div>
          <div class="menu-body">
            <h3>Salsas Extra</h3>
            <p>Variedad de salsas para intensificar el sabor.</p>
            <span class="menu-price">$20</span>
          </div>
        </article>

      </div>
    </section>

  </main>
<footer class="site-footer">
  <img src="/assets/images/inconoB.jpg" alt="El Arca">
  <p>© 2024 Restaurante Bar El Arca</p>
</footer>

</body>
</html>
