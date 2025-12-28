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
    <title>Extras — El Arca</title>
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
            <h1>Extras</h1>
            <p>Complementos para acompañar tus platillos</p>
        </header>

        <!-- GRID DE PRODUCTOS -->
        <div class="menu-grid">

            <article class="product-card"
                data-name="Guacamole"
                data-img="/assets/images/extra-guacamole.jpg"
                data-desc="Guacamole preparado al momento con aguacate fresco.">

                <div class="menu-media">
                    <img src="/assets/images/extra-guacamole.jpg" alt="Guacamole">
                </div>

                <div class="product-body">
                    <h3>Guacamole</h3>
                    <p>Aguacate fresco con limón y sal.</p>

                    <div class="product-footer">
                        <span class="menu-price">$45</span>
                        <button class="btn product-btn open-modal">
                            Ver detalle
                        </button>
                    </div>
                </div>
            </article>

            <article class="product-card"
                data-name="Frijoles Charros"
                data-img="/assets/images/extra-frijoles.jpg"
                data-desc="Frijoles charros tradicionales con tocino y chorizo.">

                <div class="menu-media">
                    <img src="/assets/images/extra-frijoles.jpg" alt="Frijoles Charros">
                </div>

                <div class="product-body">
                    <h3>Frijoles Charros</h3>
                    <p>Receta tradicional mexicana.</p>

                    <div class="product-footer">
                        <span class="menu-price">$40</span>
                        <button class="btn product-btn open-modal">
                            Ver detalle
                        </button>
                    </div>
                </div>
            </article>

            <article class="product-card"
                data-name="Papas a la Francesa"
                data-img="/assets/images/extra-papas.jpg"
                data-desc="Papas fritas crujientes, ideales para compartir.">

                <div class="menu-media">
                    <img src="/assets/images/extra-papas.jpg" alt="Papas a la Francesa">
                </div>

                <div class="product-body">
                    <h3>Papas a la Francesa</h3>
                    <p>Crujientes y doradas.</p>

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
