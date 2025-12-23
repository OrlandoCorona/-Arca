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
  <title>Comida — El Arca</title>
  <link rel="stylesheet" href="/assets/css/styles.css">
</head>

<body>

  <?php require __DIR__ . '/partials/navbar.php'; ?>

  <main class="app-container">

    <section class="menu-section">
      <header class="menu-header">
        <h1>Comida</h1>
        <p>Platillos preparados al momento con ingredientes frescos</p>
      </header>

      <div class="menu-grid">

        <!-- CARD 1 -->
        <article class="menu-card">
          <div class="menu-media">
            <img src="/assets/images/inicio1.jpg" alt="Platillo principal">
          </div>
          <div class="menu-body">
            <h3>Platillo Tradicional</h3>
            <p>
              Receta clásica preparada con el sabor característico de El Arca.
            </p>
            <span class="menu-price">$140</span>
          </div>
        </article>

        <!-- CARD 2 -->
        <article class="menu-card">
          <div class="menu-media">
            <img src="/assets/images/inicio2.jpg" alt="Platillo especial">
          </div>
          <div class="menu-body">
            <h3>Especial de la Casa</h3>
            <p>
              Una opción ideal para quienes buscan algo diferente y delicioso.
            </p>
            <span class="menu-price">$160</span>
          </div>
        </article>

        <!-- CARD 3 -->
        <article class="menu-card">
          <div class="menu-media">
            <img src="/assets/images/inicio3.jpg" alt="Complemento">
          </div>
          <div class="menu-body">
            <h3>Complemento</h3>
            <p>
              Perfecto para acompañar cualquier platillo principal.
            </p>
            <span class="menu-price">$80</span>
          </div>
        </article>

      </div>
    </section>

  </main>

  <script src="/assets/js/script.js"></script>
</body>
</html>
