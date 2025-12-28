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
    <title>Snacks — El Arca</title>
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
            <h1>Snacks</h1>
            <p>Opciones ligeras para compartir</p>
        </header>

        <!-- GRID DE PRODUCTOS -->
        <div class="menu-grid">

            <article class="product-card"
                data-name="Nachos con Queso"
                data-img="/assets/images/snack-nachos.jpg"
                data-desc="Totopos crujientes con queso fundido.">

                <div class="menu-media">
                    <img src="/assets/images/snack-nachos.jpg" alt="Nachos con Queso">
                </div>

                <div class="product-body">
                    <h3>Nachos con Queso</h3>
                    <p>Clásicos y crujientes.</p>

                    <div class="product-footer">
                        <span class="menu-price">$65</span>
                        <button class="btn product-btn open-modal">
                            Ver detalle
                        </button>
                    </div>
                </div>
            </article>

            <article class="product-card"
                data-name="Aros de Cebolla"
                data-img="/assets/images/snack-aros-cebolla.jpg"
                data-desc="Aros de cebolla empanizados y dorados.">

                <div class="menu-media">
                    <img src="/assets/images/snack-aros-cebolla.jpg" alt="Aros de Cebolla">
                </div>

                <div class="product-body">
                    <h3>Aros de Cebolla</h3>
                    <p>Crujientes por fuera, suaves por dentro.</p>

                    <div class="product-footer">
                        <span class="menu-price">$60</span>
                        <button class="btn product-btn open-modal">
                            Ver detalle
                        </button>
                    </div>
                </div>
            </article>

            <article class="product-card"
                data-name="Palomitas Preparadas"
                data-img="/assets/images/snack-palomitas.jpg"
                data-desc="Palomitas con mantequilla y especias.">

                <div class="menu-media">
                    <img src="/assets/images/snack-palomitas.jpg" alt="Palomitas Preparadas">
                </div>

                <div class="product-body">
                    <h3>Palomitas Preparadas</h3>
                    <p>Ideales para compartir.</p>

                    <div class="product-footer">
                        <span class="menu-price">$50</span>
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
