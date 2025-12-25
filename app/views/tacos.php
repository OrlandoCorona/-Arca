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

<main class="app-container">

    <button class="btn-back" onclick="history.back()">← Volver</button>

    <section class="menu-section">
        <header class="menu-header">
            <h1>Tacos</h1>
            <p>Tacos preparados al momento con recetas tradicionales</p>
        </header>

        <div class="menu-grid">

            <article class="menu-card taco-card" data-name="Taco al Pastor" data-price="25" data-img="/assets/images/taco1.jpg">
                <div class="menu-media">
                    <img src="/assets/images/taco1.jpg" alt="Taco al Pastor">
                </div>
                <div class="menu-body">
                    <h3>Taco al Pastor</h3>
                    <p>Carne marinada con piña y especias tradicionales.</p>
                    <span class="menu-price">$25</span>
                    <button class="btn btn-animated open-modal">
                        <span class="text">Añadir al carrito</span>
                    </button>
                </div>
            </article>

        </div>
    </section>

</main>

<!-- MODAL -->
<div class="modal" id="productModal">
    <div class="modal-content">
        <img id="modalImg" src="" alt="">
        <h3 id="modalTitle"></h3>
        <p id="modalDesc"></p>
        <button class="btn btn-animated">
            <span class="text">Añadir al carrito</span>
        </button>
        <button class="btn-back" id="closeModal">Cerrar</button>
    </div>
</div>

<footer class="site-footer">
    <img src="/assets/images/inconoB.jpg" alt="El Arca">
    <p>© 2024 Restaurante Bar El Arca</p>
</footer>

<script>
document.querySelectorAll('.open-modal').forEach(btn => {
    btn.addEventListener('click', e => {
        const card = e.target.closest('.menu-card');
        document.getElementById('modalImg').src = card.dataset.img;
        document.getElementById('modalTitle').textContent = card.dataset.name;
        document.getElementById('modalDesc').textContent = 'Delicioso taco recién preparado.';
        document.getElementById('productModal').style.display = 'flex';
    });
});

document.getElementById('closeModal').onclick = () => {
    document.getElementById('productModal').style.display = 'none';
};
</script>

</body>
</html>
