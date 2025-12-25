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

<main class="app-container">

    <button class="btn-back" onclick="history.back()">← Volver</button>

    <section class="menu-section">
        <header class="menu-header">
            <h1>Cervezas</h1>
            <p>Selección bien fría</p>
        </header>

        <div class="menu-grid">

            <article class="menu-card">
                <div class="menu-media">
                    <img src="/assets/images/inicio5.jpg" alt="Cerveza">
                </div>
                <div class="menu-body">
                    <h3>Cerveza Clara</h3>
                    <span class="menu-price">$55</span>
                </div>
            </article>

        </div>
    </section>

</main>

<footer class="site-footer">
    <img src="/assets/images/inconoB.jpg" alt="El Arca">
    <p>© 2024 Restaurante Bar El Arca</p>
</footer>

</body>
</html>
