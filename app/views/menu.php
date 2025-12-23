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

  <?php require __DIR__ . '/partials/navbar.php'; ?>

  <main class="app-container">

    <section class="menu-section">
      <header class="menu-header">
        <h1>Menú</h1>
        <p>Explora nuestras opciones disponibles</p>
      </header>

      <div class="menu-grid">

        <!-- CARD 1 -->
        <article class="menu-card">
          <div class="menu-media">
            <img src="/assets/images/inicio10.png" alt="Platillo destacado">
          </div>
          <div class="menu-body">
            <h3>Platillo Especial</h3>
            <p>
              Una combinación perfecta de ingredientes frescos y sabor único,
              ideal para disfrutar en cualquier momento.
            </p>
            <span class="menu-price">$120</span>
          </div>
        </article>

        <!-- CARD 2 -->
        <article class="menu-card">
          <div class="menu-media">
            <img src="/assets/images/of1.jpg" alt="Bebida">
          </div>
          <div class="menu-body">
            <h3>Bebida Refrescante</h3>
            <p>
              Refrescante, bien fría y perfecta para acompañar tus platillos.
            </p>
            <span class="menu-price">$60</span>
          </div>
        </article>

        <!-- CARD 3 -->
        <article class="menu-card">
          <div class="menu-media">
            <img src="/assets/images/inicio3.jpg" alt="Postre">
          </div>
          <div class="menu-body">
            <h3>Postre de la Casa</h3>
            <p>
              El toque dulce ideal para cerrar tu experiencia en El Arca.
            </p>
            <span class="menu-price">$75</span>
          </div>
        </article>

      </div>
    </section>

  </main>

  <script src="/assets/js/script.js"></script>
</body>
</html>
