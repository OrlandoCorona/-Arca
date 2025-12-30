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
    <link rel="stylesheet" href="/assets/css/styles.css?v=2025-01">
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
            <?php
            $products = include __DIR__ . '/../config/products.php';
            $items = $products['cervezas_media_355ml'] ?? [];
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

                    <div class="product-footer" style="flex-wrap: wrap; gap: 0.4rem; justify-content: space-between;">
                        <span class="menu-price" style="width: 100%; margin-bottom: 0.4rem; font-size: 1.1rem; color: var(--primary);">$--</span>
                        
                        <button class="btn product-btn open-modal" style="flex: 1; min-width: 45%; background: rgba(0,0,0,0.3); border: 1px solid var(--primary); font-size: 0.75rem;">
                            Ver detalle
                        </button>
                        
                        <button class="btn product-btn add-to-cart-btn" style="flex: 1; min-width: 45%; font-size: 0.75rem;">
                            Agregar
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
            <button class="btn btn-animated add-to-cart">
                <span class="text">Añadir al carrito</span>
            </button>
            <button class="btn-back" id="closeModal">Cerrar</button>
        </div>
    </div>
</div>

<footer class="site-footer">
    <div class="footer-inner">
        <img src="/assets/images/logo-footer.jpg" alt="El Arca" class="footer-logo">
        <p class="footer-text">© 2025 Restaurante Bar El Arca — Donde la naturaleza y la gastronomía se encuentran.</p>
    </div>
</footer>

<!-- JS UI CENTRALIZADO -->
<script src="/assets/js/ui.js"></script>

</body>
</html>
