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

    <!-- Botón volver -->
    <div class="section-top">
      <button class="btn-back" onclick="history.back()">← Volver</button>
    </div>

    <section class="menu-section">
      <header class="menu-header">
        <h1>Botellas</h1>
        <p>Opciones ideales para compartir en grupo</p>
      </header>

      <div class="menu-grid">

        <article class="menu-card">
          <div class="menu-media">
            <img src="/assets/images/inicio7.jpg" alt="Botella nacional">
          </div>
          <div class="menu-body">
            <h3>Botella Nacional</h3>
            <p>Perfecta para reuniones y celebraciones.</p>
            <span class="menu-price">$750</span>
          </div>
        </article>

        <article class="menu-card">
          <div class="menu-media">
            <img src="/assets/images/inicio6.jpg" alt="Botella premium">
          </div>
          <div class="menu-body">
            <h3>Botella Premium</h3>
            <p>Selección especial con mayor cuerpo y carácter.</p>
            <span class="menu-price">$1,200</span>
          </div>
        </article>

        <article class="menu-card">
          <div class="menu-media">
            <img src="/assets/images/inicio5.jpg" alt="Botella especial">
          </div>
          <div class="menu-body">
            <h3>Botella Especial</h3>
            <p>Ideal para ocasiones especiales.</p>
            <span class="menu-price">$1,500</span>
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
