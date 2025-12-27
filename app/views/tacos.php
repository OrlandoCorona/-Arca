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

    <!-- VOLVER -->
    <div class="menu-back">
        <button class="btn-back" onclick="history.back()">← Volver</button>
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
                data-price="25"
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
    <img src="/assets/images/inconoB.jpg" alt="El Arca">
    <p>© 2024 Restaurante Bar El Arca</p>
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
