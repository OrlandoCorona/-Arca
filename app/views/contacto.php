<?php
declare(strict_types=1);

// Optional: If Contact page requires auth, uncomment below.
// Usually Contact pages are public.
// if (!isset($_SESSION['id_usuario'])) { header('Location: /?view=login'); exit; }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto — El Arca</title>
    <link rel="stylesheet" href="/assets/css/styles.css?v=2025-01">
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
        rel="stylesheet" />
</head>

<body class="app-container">

    <?php require __DIR__ . '/partials/navbar.php'; ?>

    <main style="padding-bottom: 6rem;">

        <!-- Headline -->
        <div class="px-4 pt-8 pb-4 relative z-10" style="padding: 2rem 1.5rem 1rem;">
            <span
                style="color: var(--primary); font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 2px; display: block; margin-bottom: 0.5rem;">Premium
                Experience</span>
            <h1 style="color: white; font-family: var(--font-hero); font-size: 2rem; line-height: 1.1;">Ubicación y
                Contacto</h1>
            <p style="color: var(--text-muted); margin-top: 0.5rem; font-size: 0.9rem;">Encuentra tu camino hacia la
                naturaleza.</p>
        </div>

        <!-- Map Section with Floating Card -->
        <div style="padding: 1rem 1.5rem; position: relative; z-index: 10;">
            <div class="map-card">
                <div class="map-bg"
                    style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAV1fBa9hvaIIg3y1LhAIpneBNgdwa4pXfGDPWcqgNcCdCR46EfRyumNtI4UW4zE0fmHhT8ZDvbCP-6vJx_ZaqvYh3BBTnTfWvCHT-PbbXR3YR-0_kcHfcJZAE9blkceiDJ_CuZ_6aZG3GkHmErWFHQlG1L-Xf4XbUgv9BoiIdi2xdJ_H0e99clEPR5NIcdzMC74ZfjDCyOutQqmzIP6-Kf-bpPRAsC-38u9OGhrul8KslNua6CVDonFFHf3s1VxCbHUNTsdOUEK7nZ');">
                </div>

                <!-- Map Pin -->
                <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                    <div
                        style="background: var(--primary); padding: 0.5rem; border-radius: 50%; box-shadow: 0 0 20px rgba(0,243,255,0.6); display: flex;">
                        <span class="material-symbols-outlined"
                            style="color: var(--bg-dark); font-weight: 700;">restaurant</span>
                    </div>
                </div>

                <!-- Floating Address -->
                <div class="floating-address">
                    <div>
                        <p style="color: white; font-weight: 700; font-size: 0.9rem;">Vía de la Naturaleza 123</p>
                        <p style="color: var(--text-muted); font-size: 0.8rem;">San José, Costa Rica</p>
                    </div>
                    <button
                        style="background: rgba(255,255,255,0.1); border: none; border-radius: 12px; padding: 0.5rem; color: white; cursor: pointer;">
                        <span class="material-symbols-outlined">directions</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Contact Hub -->
        <div style="padding: 0 1.5rem;">
            <div class="contact-hub-grid">
                <a href="tel:+123456789" class="contact-btn">
                    <div
                        style="background: rgba(0, 243, 255, 0.2); padding: 0.5rem; border-radius: 50%; display: flex;">
                        <span class="material-symbols-outlined" style="color: var(--primary);">call</span>
                    </div>
                    <span style="font-size: 0.8rem; font-weight: 600;">Llamar</span>
                </a>
                <a href="#" class="contact-btn">
                    <div
                        style="background: rgba(37, 211, 102, 0.2); padding: 0.5rem; border-radius: 50%; display: flex;">
                        <span class="material-symbols-outlined" style="color: #25D366;">chat</span>
                    </div>
                    <span style="font-size: 0.8rem; font-weight: 600;">WhatsApp</span>
                </a>
            </div>
        </div>

        <!-- Schedule -->
        <div style="padding: 1rem 1.5rem;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                <h3 style="color: white; font-size: 1.2rem; font-weight: 700;">Horario</h3>
                <div
                    style="display: flex; align-items: center; gap: 0.5rem; background: rgba(0, 243, 255, 0.1); padding: 0.25rem 0.75rem; border-radius: 99px; border: 1px solid rgba(0, 243, 255, 0.2);">
                    <span style="width: 8px; height: 8px; background: var(--primary); border-radius: 50%;"></span>
                    <span
                        style="color: var(--primary); font-size: 0.65rem; font-weight: 700; text-transform: uppercase;">Abierto
                        Ahora</span>
                </div>
            </div>

            <div class="schedule-list">
                <div class="schedule-item">
                    <span style="color: var(--text-muted); font-size: 0.9rem;">Lunes - Jueves</span>
                    <span style="color: white; font-weight: 500; font-size: 0.9rem;">12:00 PM - 10:00 PM</span>
                </div>
                <div class="schedule-item highlight">
                    <span style="color: white; font-weight: 700; font-size: 0.9rem;">Viernes - Sábado</span>
                    <span style="color: var(--primary); font-weight: 700; font-size: 0.9rem;">12:00 PM - 12:00 AM</span>
                </div>
                <div class="schedule-item">
                    <span style="color: var(--text-muted); font-size: 0.9rem;">Domingos</span>
                    <span style="color: white; font-weight: 500; font-size: 0.9rem;">11:00 AM - 09:00 PM</span>
                </div>
            </div>
        </div>

    </main>

    <nav class="bottom-nav">
        <a href="/?view=home" class="nav-item">
            <span class="material-symbols-outlined">home</span>
            <span>Inicio</span>
        </a>
        <a href="/?view=menu" class="nav-item">
            <span class="material-symbols-outlined">menu_book</span>
            <span>Menú</span>
        </a>
        <a href="/?view=galeria" class="nav-item">
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