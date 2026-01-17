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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería — El Arca</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
        rel="stylesheet" />
    <link rel="stylesheet" href="/assets/css/styles.css?v=2025-01">
    <style>
        /* Masonry Inline Styles in case styles.css update fails */
        .masonry-grid {
            column-count: 2;
            column-gap: 1rem;
            padding: 0 1.5rem 6rem 1.5rem;
            /* Padding bottom for nav */
        }

        @media (min-width: 768px) {
            .masonry-grid {
                column-count: 3;
            }
        }

        .masonry-item {
            break-inside: avoid;
            margin-bottom: 1rem;
            border-radius: var(--radius-md);
            overflow: hidden;
            position: relative;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            width: 100%;
        }

        .aspect-square {
            aspect-ratio: 1/1;
        }

        .aspect-tall {
            aspect-ratio: 3/5;
        }

        .aspect-wide {
            aspect-ratio: 4/3;
        }

        .masonry-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(2, 6, 23, 0.9), transparent);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 1rem;
        }

        .masonry-tag {
            color: var(--primary);
            font-size: 0.65rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 0.25rem;
        }

        .masonry-title {
            color: white;
            font-weight: 700;
            font-size: 1rem;
            line-height: 1.2;
        }
    </style>
</head>

<body>

    <?php require __DIR__ . '/partials/navbar.php'; ?>

    <main class="app-container galeria-page">

        <!-- Hero / Title -->
        <div style="padding: 1.5rem; text-align: center;">
            <h1 style="font-family: var(--font-hero); font-size: 2rem; color: white;">Galería</h1>
            <p style="color: var(--text-muted);">Momentos inolvidables en El Arca</p>
        </div>

        <!-- Chips Filters -->
        <section class="chips-container" style="justify-content: center;">
            <a href="#" class="chip active">Todos</a>
            <a href="#" class="chip">Instalaciones</a>
            <a href="#" class="chip">Platillos</a>
            <a href="#" class="chip">Eventos</a>
        </section>

        <!-- Masonry Grid -->
        <div class="masonry-grid">
            <!-- Item 1 -->
            <div class="masonry-item aspect-tall">
                <div
                    style="width: 100%; height: 100%; background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDWzNEJV6oTzrc4YnwSCyxgxTarI0u15Tf8xOjYU0G2h7kT7lUoTF9t2i1GwT0MCy_xNLhShrwPaFYzaue2_mfqC4uqZySWpF4a-5R_Q0m4twebtOq2qkEInjPmnnPWZzgrA7fBb9w8vxOWWcB6RUGhk-nspXMWMmiV52BZCys3PUqSQu0LRDHoC_rhA52owuP7hnGiQtYrcqDPjmcG0YtB294TrO-zJ7-UfpSf68X4Pp8a7SXow9Alac4Kfr0Hk7SD8zyOBC8jqBud'); background-size: cover; background-position: center;">
                </div>
                <div class="masonry-overlay">
                    <span class="masonry-tag">Instalaciones</span>
                    <span class="masonry-title">Piscina Natural</span>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="masonry-item aspect-square">
                <div
                    style="width: 100%; height: 100%; background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDQh7qaE083y93hhd0B2SyqoPddD4X92lDLx3OEb05Wq-IHsb6gKWjZ66yi0hku5AM8xpJdO41ANp9iWPWid_i0DzC1p0PlkZ1sXnlkjWBAT_hWRa9LHz_A8GSqDlhqIqmhvWsYf9j-C61907_lNnQCynzAJjJ-k0VoMtpkzRaN_coSxVawq3uQaGMFK1ILhQt2FVbd27Q3XwjdHviLLsgKAr_uhhrLLgrhMMoXnWnQ-7u31H-ZORpPQ44RG1Z16KUZJL97GYe2Vlu_'); background-size: cover; background-position: center;">
                </div>
                <div class="masonry-overlay">
                    <span class="masonry-tag">Platillos</span>
                    <span class="masonry-title">Corte Premium</span>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="masonry-item aspect-tall">
                <div
                    style="width: 100%; height: 100%; background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCCJsp1z4E7knwp_UwlDWs1C72Eu-ZdOzrrOh5XbXNGX9zgr7Ccq1nBy2vuF2Rr9qOi1gKziiPFJCjoKtVqtiYkKTHaap3lnINFIUQoCghKloeTyE4oKiYsRpNvcrZe0gD3SVjax25bPSomoXW7YahtwK7uhl1eR-DESoVBHqCwGTM6K7CRixbz_dkxu01yU7yheX2zH7nf9h25yYKmn2YUcg8PWx_9E2CUgU5Lio5Eromy6I6nJG0CqbaV52amjw2tyo_3xGQqZMkP'); background-size: cover; background-position: center;">
                </div>
                <div class="masonry-overlay">
                    <span class="masonry-tag">Diversión</span>
                    <span class="masonry-title">Zona de Billar</span>
                </div>
            </div>

            <!-- Item 4 -->
            <div class="masonry-item aspect-square">
                <div
                    style="width: 100%; height: 100%; background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDvtZYiy8EYFZ7w8eMphjR7Iztlk8rb5gr_AF2rqemDyqWTk-xZY5_uwlQvBBUMMuW-9oCcqrxO8iiIPQbz_W6iG_6uhMRKbixhXr4w5_40zGZQOsgrf-2zt0pOPA-vMLzFOq-wH3NPzpFdD7PflqYvkW47uY2nQ5zMom4cBrEae1artPoaiWyLovaPaFBAGMxrQyocWvI2BEpzo8dlgOyLlfdguLi8U-UtqR8TNIzWEqsYsG5S27Ntk8tEUgIiYtRyEfgyy3cY5B6w'); background-size: cover; background-position: center;">
                </div>
                <div class="masonry-overlay">
                    <span class="masonry-tag">Bar</span>
                    <span class="masonry-title">Coctelería</span>
                </div>
            </div>
        </div>

    </main>

    <!-- iOS Bottom Navigation -->
    <nav class="bottom-nav">
        <a href="/?view=home" class="nav-item">
            <span class="material-symbols-outlined">home</span>
            <span>Inicio</span>
        </a>
        <a href="/?view=menu" class="nav-item">
            <span class="material-symbols-outlined">menu_book</span>
            <span>Menú</span>
        </a>
        <a href="/?view=galeria" class="nav-item active">
            <span class="material-symbols-outlined">gallery_thumbnail</span>
            <span>Galería</span>
        </a>
        <a href="/?view=reservaciones" class="nav-item">
            <span class="material-symbols-outlined">calendar_today</span>
            <span>Reservas</span>
        </a>
    </nav>

</body>

</html>