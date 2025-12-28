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

      <article class="product-card"
        data-name="Michelada Clásica"
        data-price="75"
        data-img="/assets/images/inicio5.jpg"
        data-desc="Limón natural, sal y salsas tradicionales. Bien fría.">

        <div class="menu-media">
          <img src="/assets/images/inicio5.jpg" alt="Michelada Clásica">
        </div>

        <div class="product-body">
          <h3>Michelada Clásica</h3>
          <p>Limón, sal y salsas tradicionales.</p>

          <div class="product-footer">
            <span class="menu-price">$75</span>
            <button class="btn product-btn open-modal">
              Ver detalle
            </button>
          </div>
        </div>
      </article>

      <!-- Puedes agregar más micheladas aquí -->

    </div>

  </section>
</main>

<!-- MODAL PRODUCTO -->
<div class="modal" id="productModal">
  <div class="modal-overlay"></div>

  <div class="modal-content">
    <img id="modalImg" src="" alt="">
    <h3 id="modalTitle"></h3>
    <p id="modalDesc"></p>

    <div class="modal-actions">
      <button class="btn btn-animated">
        <span class="text">Añadir al carrito</span>
      </button>
      <button class="btn-back" id="closeModal">Cerrar</button>
    </div>
  </div>
</div>

<footer class="site-footer">
  <div class="footer-inner">
    <img src="/assets/images/iconoB.jpg" alt="El Arca" class="footer-logo">
    <p class="footer-text">© 2024 Restaurante Bar El Arca</p>
  </div>
</footer>

<!-- JS UI CENTRALIZADO -->
<script src="/assets/js/ui.js"></script>

</body>
</html>
