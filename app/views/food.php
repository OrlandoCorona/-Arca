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

  <!-- NAVBAR -->
  <?php require __DIR__ . '/partials/navbar.php'; ?>

  <!-- CONTENIDO -->
  <main class="app-container product-page">

    <!-- BOTÓN VOLVER -->
    <button class="btn-back" onclick="history.back()">← Volver</button>

    <!-- HEADER -->
    <section class="menu-section">
      <header class="menu-header">
        <h1>Comida</h1>
        <p>Platillos preparados al momento</p>
      </header>

      <!-- GRID DE PRODUCTOS -->
      <div class="menu-grid">

        <!-- PRODUCTO -->
        <article class="menu-card product-card">
          <div class="menu-media">
            <img src="/assets/images/inicio1.jpg" alt="Platillo tradicional">
          </div>

          <div class="menu-body">
            <h3>Platillo Tradicional</h3>
            <p>Receta clásica preparada con el sabor característico de El Arca.</p>

            <div class="product-footer">
              <span class="menu-price">$140</span>
              <button class="btn btn-animated">
                <span class="text">Agregar</span>
              </button>
            </div>
          </div>
        </article>

        <!-- PRODUCTO -->
        <article class="menu-card product-card">
          <div class="menu-media">
            <img src="/assets/images/inicio2.jpg" alt="Especial de la casa">
          </div>

          <div class="menu-body">
            <h3>Especial de la Casa</h3>
            <p>Una opción ideal para quienes buscan algo diferente y delicioso.</p>

            <div class="product-footer">
              <span class="menu-price">$160</span>
              <button class="btn btn-animated">
                <span class="text">Agregar</span>
              </button>
            </div>
          </div>
        </article>

        <!-- PRODUCTO -->
        <article class="menu-card product-card">
          <div class="menu-media">
            <img src="/assets/images/inicio3.jpg" alt="Complemento">
          </div>

          <div class="menu-body">
            <h3>Complemento</h3>
            <p>Perfecto para acompañar cualquier platillo principal.</p>

            <div class="product-footer">
              <span class="menu-price">$80</span>
              <button class="btn btn-animated">
                <span class="text">Agregar</span>
              </button>
            </div>
          </div>
        </article>

      </div>
    </section>

  </main>

  <!-- FOOTER -->
  <footer class="site-footer">
    <div class="footer-inner">
      <img src="/assets/images/iconoB.jpg" alt="El Arca" class="footer-logo">
      <p class="footer-text">© 2024 Restaurante Bar El Arca</p>
    </div>
  </footer>

  <script src="/assets/js/script.js"></script>
</body>
</html>
