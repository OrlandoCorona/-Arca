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

<main class="app-container product-page">

  <!-- VOLVER -->
  <div class="menu-back">
    <button class="btn-back" onclick="history.back()">← Volver</button>
  </div>

  <section class="menu-section">
    <header class="menu-header">
      <h1>Comida</h1>
      <p>Platillos preparados al momento</p>
    </header>

    <!-- GRID DE PRODUCTOS -->
    <div class="menu-grid">

      <article class="product-card"
        data-name="Platillo Tradicional"
        data-price="140"
        data-img="/assets/images/inicio1.jpg"
        data-desc="Receta clásica preparada con el sabor característico de El Arca.">

        <div class="menu-media">
          <img src="/assets/images/inicio1.jpg" alt="Platillo Tradicional">
        </div>

        <div class="product-body">
          <h3>Platillo Tradicional</h3>
          <p>Receta clásica preparada con el sabor característico de El Arca.</p>

          <div class="product-footer">
            <span class="menu-price">$140</span>
            <button class="btn product-btn open-modal">
              Ver detalle
            </button>
          </div>
        </div>
      </article>

      <article class="product-card"
        data-name="Especial de la Casa"
        data-price="160"
        data-img="/assets/images/inicio2.jpg"
        data-desc="Una opción ideal para quienes buscan algo diferente y delicioso.">

        <div class="menu-media">
          <img src="/assets/images/inicio2.jpg" alt="Especial de la Casa">
        </div>

        <div class="product-body">
          <h3>Especial de la Casa</h3>
          <p>Una opción ideal para quienes buscan algo diferente y delicioso.</p>

          <div class="product-footer">
            <span class="menu-price">$160</span>
            <button class="btn product-btn open-modal">
              Ver detalle
            </button>
          </div>
        </div>
      </article>

      <article class="product-card"
        data-name="Complemento"
        data-price="80"
        data-img="/assets/images/inicio3.jpg"
        data-desc="Perfecto para acompañar cualquier platillo principal.">

        <div class="menu-media">
          <img src="/assets/images/inicio3.jpg" alt="Complemento">
        </div>

        <div class="product-body">
          <h3>Complemento</h3>
          <p>Perfecto para acompañar cualquier platillo principal.</p>

          <div class="product-footer">
            <span class="menu-price">$80</span>
            <button class="btn product-btn open-modal">
              Ver detalle
            </button>
          </div>
        </div>
      </article>

    </div>
  </section>

</main>

<!-- MODAL DE PRODUCTO -->
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


<script>
document.querySelectorAll('.open-modal').forEach(btn => {
  btn.addEventListener('click', e => {
    const card = e.target.closest('.product-card');

    document.getElementById('modalImg').src = card.dataset.img;
    document.getElementById('modalTitle').textContent = card.dataset.name;
    document.getElementById('modalDesc').textContent = card.dataset.desc;

    document.getElementById('productModal').classList.add('active');
  });
});

document.getElementById('closeModal').onclick = () => {
  document.getElementById('productModal').classList.remove('active');
};

document.querySelector('.modal-overlay').onclick = () => {
  document.getElementById('productModal').classList.remove('active');
};
</script>

</body>
</html>
