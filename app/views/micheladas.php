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

  <main class="app-container">

    <section class="menu-section">
      <header class="menu-header">
        <h1>Micheladas</h1>
        <p>Refrescantes, picositas y perfectas para compartir</p>
      </header>

      <div class="menu-grid">

        <article class="menu-card">
          <div class="menu-media">
            <img src="/assets/images/michelada1.jpg" alt="Michelada clásica">
          </div>
          <div class="menu-body">
            <h3>Michelada Clásica</h3>
            <p>Cerveza, limón, salsas y escarchado tradicional.</p>
            <span class="menu-price">$70</span>
          </div>
        </article>

        <article class="menu-card">
          <div class="menu-media">
            <img src="/assets/images/michelada2.jpg" alt="Michelada especial">
          </div>
          <div class="menu-body">
            <h3>Michelada Especial</h3>
            <p>Preparación especial con mix de salsas premium.</p>
            <span class="menu-price">$85</span>
          </div>
        </article>

        <article class="menu-card">
          <div class="menu-media">
            <img src="/assets/images/michelada3.jpg" alt="Michelada con camarón">
          </div>
          <div class="menu-body">
            <h3>Michelada con Camarón</h3>
            <p>La favorita: potente, fresca y con carácter.</p>
            <span class="menu-price">$110</span>
          </div>
        </article>

      </div>
    </section>

  </main>

</body>
</html>
