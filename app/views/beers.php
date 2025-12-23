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
  <title>Cervezas — El Arca</title>
  <link rel="stylesheet" href="/assets/css/styles.css">
</head>

<body>

  <?php require __DIR__ . '/partials/navbar.php'; ?>

  <main class="app-container">

    <section class="menu-section">
      <header class="menu-header">
        <h1>Cervezas</h1>
        <p>Selección de cervezas bien frías para todos los gustos</p>
      </header>

      <div class="menu-grid">

        <!-- CARD 1 -->
        <article class="menu-card">
          <div class="menu-media">
            <img src="/assets/images/inicio5.jpg" alt="Cerveza clara">
          </div>
          <div class="menu-body">
            <h3>Cerveza Clara</h3>
            <p>
              Refrescante y ligera, ideal para cualquier momento.
            </p>
            <span class="menu-price">$55</span>
          </div>
        </article>

        <!-- CARD 2 -->
        <article class="menu-card">
          <div class="menu-media">
            <img src="/assets/images/inicio6.jpg" alt="Cerveza oscura">
          </div>
          <div class="menu-body">
            <h3>Cerveza Oscura</h3>
            <p>
              Sabor intenso y cuerpo definido para los paladares exigentes.
            </p>
            <span class="menu-price">$65</span>
          </div>
        </article>

        <!-- CARD 3 -->
        <article class="menu-card">
          <div class="menu-media">
            <img src="/assets/images/inicio7.jpg" alt="Cerveza especial">
          </div>
          <div class="menu-body">
            <h3>Cerveza Especial</h3>
            <p>
              Una opción diferente para quienes buscan algo fuera de lo común.
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
