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
    <title>Postres — El Arca</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/styles.css?v=2025-01">
</head>

<body class="page-postres">

<?php require __DIR__ . '/partials/navbar.php'; ?>

<main class="app-container product-page">

    <div class="menu-back">
        <a href="/?view=food" class="btn-back">← Volver</a>
    </div>

    <section class="menu-section">
        <header class="menu-header">
            <h1>Postres</h1>
            <p>El toque dulce para cerrar tu experiencia</p>
        </header>

        <div class="menu-grid">

            <article class="product-card"
                data-name="Pastel de Chocolate"
                data-img="/assets/images/postre-pastel-chocolate.jpg"
                data-desc="Pastel de chocolate con textura suave e intenso sabor.">

                <div class="menu-media">
                    <img src="/assets/images/postre-pastel-chocolate.jpg" alt="Pastel de Chocolate">
                </div>

                <div class="product-body">
                    <h3>Pastel de Chocolate</h3>
                    <p>Clásico y delicioso.</p>

                    <div class="product-footer" style="flex-wrap: wrap; gap: 0.4rem; justify-content: space-between;">
                        <span class="menu-price" style="width: 100%; margin-bottom: 0.4rem; font-size: 1.1rem; color: var(--primary);">$70</span>
                        
                        <button class="btn product-btn open-modal" style="flex: 1; min-width: 45%; background: rgba(0,0,0,0.3); border: 1px solid var(--primary); font-size: 0.75rem;">
                            Ver detalle
                        </button>
                        
                        <button class="btn product-btn add-to-cart-btn" style="flex: 1; min-width: 45%; font-size: 0.75rem;">
                            Agregar
                        </button>
                    </div>
                </div>
            </article>

            <article class="product-card"
                data-name="Flan Napolitano"
                data-img="/assets/images/postre-flan.jpg"
                data-desc="Flan napolitano tradicional con caramelo.">

                <div class="menu-media">
                    <img src="/assets/images/postre-flan.jpg" alt="Flan Napolitano">
                </div>

                <div class="product-body">
                    <h3>Flan Napolitano</h3>
                    <p>Suave y cremoso.</p>

                    <div class="product-footer" style="flex-wrap: wrap; gap: 0.4rem; justify-content: space-between;">
                        <span class="menu-price" style="width: 100%; margin-bottom: 0.4rem; font-size: 1.1rem; color: var(--primary);">$65</span>
                        
                        <button class="btn product-btn open-modal" style="flex: 1; min-width: 45%; background: rgba(0,0,0,0.3); border: 1px solid var(--primary); font-size: 0.75rem;">
                            Ver detalle
                        </button>
                        
                        <button class="btn product-btn add-to-cart-btn" style="flex: 1; min-width: 45%; font-size: 0.75rem;">
                            Agregar
                        </button>
                    </div>
                </div>
            </article>

            <article class="product-card"
                data-name="Helado Artesanal"
                data-img="/assets/images/postre-helado.jpg"
                data-desc="Helado artesanal de sabores variados.">

                <div class="menu-media">
                    <img src="/assets/images/postre-helado.jpg" alt="Helado Artesanal">
                </div>

                <div class="product-body">
                    <h3>Helado Artesanal</h3>
                    <p>Refrescante y cremoso.</p>

                    <div class="product-footer" style="flex-wrap: wrap; gap: 0.4rem; justify-content: space-between;">
                        <span class="menu-price" style="width: 100%; margin-bottom: 0.4rem; font-size: 1.1rem; color: var(--primary);">$55</span>
                        
                        <button class="btn product-btn open-modal" style="flex: 1; min-width: 45%; background: rgba(0,0,0,0.3); border: 1px solid var(--primary); font-size: 0.75rem;">
                            Ver detalle
                        </button>
                        
                        <button class="btn product-btn add-to-cart-btn" style="flex: 1; min-width: 45%; font-size: 0.75rem;">
                            Agregar
                        </button>
                    </div>
                </div>
            </article>

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
