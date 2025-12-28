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
    <title>Tacos — El Arca</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>

<body>

<?php require __DIR__ . '/partials/navbar.php'; ?>

<main class="app-container product-page">

    <!-- VOLVER A COMIDA -->
    <div class="menu-back">
        <a href="/?view=food" class="btn-back">← Volver</a>
    </div>

    <section class="menu-section">
        <header class="menu-header">
            <h1>Tacos</h1>
            <p>Tacos preparados al momento con recetas tradicionales</p>
        </header>

        <!-- GRID DE PRODUCTOS -->
        <div class="menu-grid">

            <article class="product-card"
                data-name="Taco al Pastor"
                data-img="/assets/images/taco1.jpg"
                data-desc="Carne marinada con piña y especias tradicionales.">

                <div class="menu-media">
                    <img src="/assets/images/taco1.jpg" alt="Taco al Pastor">
                </div>

                <div class="product-body">
                    <h3>Taco al Pastor</h3>
                    <p>Carne marinada con piña y especias tradicionales.</p>

                    <div class="product-footer">
                        <span class="menu-price">$25</span>
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
