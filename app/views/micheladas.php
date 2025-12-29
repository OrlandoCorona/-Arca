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
  <link rel="stylesheet" href="/assets/css/styles.css?v=2025-01">
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
      <?php
      $products = include __DIR__ . '/../config/products.php';
      $keys = [
        'micheladas_grandes_clasicas_1_2l',
        'micheladas_medianas_355ml',
        'micheladas_grandes_premium'
      ];
      $items = [];
      foreach ($keys as $k) {
        if (isset($products[$k]) && is_array($products[$k])) {
          $items = array_merge($items, $products[$k]);
        }
      }
      foreach ($items as $p):
      ?>
      <article class="product-card"
        data-name="<?= htmlspecialchars($p['name']) ?>"
        data-img="/assets/images/<?= htmlspecialchars($p['image']) ?>"
        data-desc="<?= htmlspecialchars($p['name']) ?>">

        <div class="menu-media">
          <img src="/assets/images/<?= htmlspecialchars($p['image']) ?>" alt="<?= htmlspecialchars($p['name']) ?>">
        </div>

        <div class="product-body">
          <h3><?= htmlspecialchars($p['name']) ?></h3>
          <p><?= htmlspecialchars($p['name']) ?></p>

          <div class="product-footer">
            <span class="menu-price">$--</span>
            <button class="btn product-btn open-modal">
              Ver detalle
            </button>
          </div>
        </div>
      </article>
      <?php endforeach; ?>
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
