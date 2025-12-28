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
    <title>Cervezas — El Arca</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>

<body>

<?php require __DIR__ . '/partials/navbar.php'; ?>

<main class="app-container product-page">

    <!-- VOLVER A MENÚ -->
    <div class="menu-back">
        <a href="/?view=menu" class="btn-back">← Volver</a>
    </div>

    <section class="menu-section">
        <header class="menu-header">
            <h1>Cervezas</h1>
            <p>Selección bien fría</p>
        </header>

        <!-- GRID DE PRODUCTOS -->
        <div class="menu-grid">

            <article class="product-card"
                data-name="Cerveza Clara"
                data-img="/assets/images/inicio5.jpg"
                data-desc="Cerveza clara bien fría, ideal para acompañar cualquier platillo.">

                <div class="menu-media">
                    <img src="/assets/images/inicio5.jpg" alt="Cerveza Clara">
                </div>

                <div class="product-body">
                    <h3>Cerveza Clara</h3>
                    <p>Cerveza clara bien fría.</p>

                    <div class="product-footer">
                        <span class="menu-price">$55</span>
                        <button class="btn product-btn open-modal">
                            Ver detalle
                        </button>
                    </div>
                </div>
            </article>

            <!-- Aquí pueden ir más cervezas -->

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
    <img src="/assets/images/.jpg" alt="El Arca" class="footer-logo">
    <p class="footer-text">© 2024 Restaurante Bar El Arca</p>
  </div>
</footer>

<!-- JS UI CENTRALIZADO -->
<script src="/assets/js/ui.js"></script>

</body>
</html>
