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

<main class="app-container product-page">

  <!-- VOLVER -->
  <div class="menu-back">
    <button class="btn-back" onclick="history.back()">← Volver</button>
  </div>

  <section class="menu-section">
    <header class="menu-header">
      <h1>Botellas</h1>
      <p>Selección de botellas para compartir</p>
    </header>

    <!-- GRID DE PRODUCTOS -->
    <div class="menu-grid">

      <article class="product-card"
        data-name="Botella Premium"
        data-price="950"
        data-img="/assets/images/inicio8.jpg"
        data-desc="Sabor intenso y calidad garantizada, ideal para compartir.">

        <div class="menu-media">
          <img src="/assets/images/inicio8.jpg" alt="Botella Premium">
        </div>

        <div class="product-body">
          <h3>Botella Premium</h3>
          <p>Sabor intenso y calidad garantizada.</p>

          <div class="product-footer">
            <span class="menu-price">$950</span>
            <button class="btn product-btn open-modal">
              Ver detalle
            </button>
          </div>
        </div>
      </article>

      <article class="product-card"
        data-name="Botella Especial"
        data-price="1200"
        data-img="/assets/images/inicio9.jpg"
        data-desc="Ideal para celebraciones y momentos especiales.">

        <div class="menu-media">
          <img src="/assets/images/inicio9.jpg" alt="Botella Especial">
        </div>

        <div class="product-body">
          <h3>Botella Especial</h3>
          <p>Ideal para celebraciones.</p>

          <div class="product-footer">
            <span class="menu-price">$1,200</span>
            <button class="btn product-btn open-modal">
              Ver detalle
            </button>
          </div>
        </div>
      </article>

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
