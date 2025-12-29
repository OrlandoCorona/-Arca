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
    <link rel="stylesheet" href="/assets/css/styles.css?v=2025-01">
</head>

<body class="page-extras">

<?php require __DIR__ . '/partials/navbar.php'; ?>

<main class="app-container product-page">

    <div class="menu-back">
        <a href="/?view=food" class="btn-back">← Volver</a>
    </div>

    <section class="menu-section">
        <header class="menu-header">
            <h1>Extras</h1>
            <p>Complementos para acompañar tus platillos</p>
        </header>

        <div class="menu-grid">
            <?php
            $products = include __DIR__ . '/../config/products.php';
            $items = $products['extras_para_micheladas'] ?? [];
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
                        <button class="btn product-btn open-modal">Ver detalle</button>
                    </div>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </section>

</main>

<footer class="site-footer">
  <div class="footer-inner">
    <img src="/assets/images/logo-footer.jpg" alt="El Arca" class="footer-logo">
    <p class="footer-text">© 2024 Restaurante Bar El Arca</p>
  </div>
</footer>

<script src="/assets/js/ui.js"></script>
</body>
</html>
