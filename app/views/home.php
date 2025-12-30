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
  <title>El Arca — Restaurante Bar</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/assets/css/styles.css?v=2025-01">
</head>

<body>

  <?php require __DIR__ . '/partials/navbar.php'; ?>

  <main class="app-container home">

    <section class="hero">
      <img src="/assets/images/logo-home.png" alt="El Arca" class="hero-logo">
      <h1 class="hero-title">
        Restaurante Bar <br>
        <span class="text-wave" style="font-family: var(--font-hero); font-weight: 700; letter-spacing: -2px;">El Arca</span>
      </h1>
      <p class="hero-subtitle">
        Naturaleza · Gastronomía · Experiencia Premium
      </p>
    </section>

    <section class="section section-intro">
      <header class="section-header">
        <h2 class="text-glow">Una experiencia diferente</h2>
        <p>
          En El Arca combinamos gastronomía, naturaleza y momentos memorables.
        </p>
      </header>
      <!-- Intro cards removed as requested to integrate into carousel or kept as is? User said "Integrar esta sección como parte del carrusel cilíndrico" for specific items, but "Intro" usually introduces concepts. The "Contenido de las tarjetas" list is specific. I will keep the intro text but maybe hide the old cards if they are redundant, OR the user meant the "Terraza/Fuente/..." ARE the new featured elements. The user instructions say "Otras dos tarjetas conceptuales similares" and listed specific 6 items. I will replacing the "Lo más destacado" carousel with the NEW Cylindrical Carousel containing the 6 items. -->
    </section>

    <section class="section section-featured">
      <header class="section-header">
        <h2 class="text-glow">Explora nuestras zonas</h2>
        <p>Da clic sobre la imagen para conocer más acerca de la zona</p>
      </header>

      <div class="carousel" id="cylinderCarousel">
        <div class="carousel-track">
          <!-- 6 Cards: Terraza, Fuente, Camastros, Billar, Zona de niños, Carpas -->
          
          <article class="carousel-item" data-name="Terraza" data-desc="Disfruta de la vista y el aire libre en nuestra terraza premium.">
            <img src="/assets/images/arcairis.jpg" alt="Terraza"> <!-- Placeholder image, reused existing -->
            <div class="carousel-caption">
              <h3>Terraza</h3>
            </div>
          </article>

          <article class="carousel-item" data-name="Fuente" data-desc="Relájate con el sonido del agua en nuestra zona de fuentes.">
            <img src="/assets/images/tacos-asada-inicio.png" alt="Fuente"> <!-- Placeholder -->
            <div class="carousel-caption">
              <h3>Fuente</h3>
            </div>
          </article>

          <article class="carousel-item" data-name="Camastros" data-desc="Comodidad y descanso bajo el sol.">
             <img src="/assets/images/micheladas-inicio.png" alt="Camastros"> <!-- Placeholder -->
            <div class="carousel-caption">
              <h3>Camastros</h3>
            </div>
          </article>

          <article class="carousel-item" data-name="Billar" data-desc="Diviértete con amigos en nuestras mesas profesionales.">
             <img src="/assets/images/arcairis.jpg" alt="Billar"> <!-- Placeholder -->
            <div class="carousel-caption">
              <h3>Billar</h3>
            </div>
          </article>

           <article class="carousel-item" data-name="Zona de niños" data-desc="Diversión segura para los más pequeños.">
             <img src="/assets/images/tacos-asada-inicio.png" alt="Zona de niños"> <!-- Placeholder -->
            <div class="carousel-caption">
              <h3>Zona de niños</h3>
            </div>
          </article>

           <article class="carousel-item" data-name="Carpas" data-desc="Privacidad y confort para tu grupo.">
             <img src="/assets/images/micheladas-inicio.png" alt="Carpas"> <!-- Placeholder -->
            <div class="carousel-caption">
              <h3>Carpas</h3>
            </div>
          </article>

        </div>
      </div>
    </section>

    <section class="section section-cta">
      <!-- Image changed to principal_reservaciones.webp, glass only on box -->
      <div class="cta-box glass-panel" style="padding: 3rem; text-align: center; max-width: 600px; margin: 0 auto; position: relative; overflow: hidden; background: rgba(255,255,255,0.05);">
        
        <div style="position: relative; z-index: 2;">
          <h2 class="text-glow">¿Listo para visitarnos?</h2>
          <p style="margin-bottom: 2rem;">Reserva tu mesa y vive la experiencia El Arca.</p>

          <a href="/?view=reservaciones" class="btn btn-animated">
            <span class="text">Reservar ahora</span>
          </a>
        </div>
        
        <!-- Background Image specific to CTA box as requested -->
         <div class="cta-bg-img" style="position: absolute; inset: 0; background-image: url('/assets/images/principal_reservaciones.webp'); background-size: cover; background-position: center; opacity: 0.3; z-index: -1;"></div>
      </div>
    </section>

  </main>

  <footer class="site-footer">
    <div class="footer-inner">
      <img src="/assets/images/logo-footer.jpg" alt="El Arca" class="footer-logo">
      <p class="footer-text">© 2025 Restaurante Bar El Arca — Donde la naturaleza y la gastronomía se encuentran.</p>
    </div>
  </footer>

</body>
</html>
