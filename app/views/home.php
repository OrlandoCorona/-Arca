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
      <!-- Meteorites Container -->
      <div class="meteor-shower">
        <div class="meteor" style="left: 10%; animation-duration: 2s; animation-delay: 0s;"></div>
        <div class="meteor" style="left: 20%; animation-duration: 3s; animation-delay: 1s;"></div>
        <div class="meteor" style="left: 30%; animation-duration: 2.5s; animation-delay: 2s;"></div>
        <div class="meteor" style="left: 45%; animation-duration: 2.8s; animation-delay: 1.5s;"></div>
        <div class="meteor" style="left: 60%; animation-duration: 3.2s; animation-delay: 0.5s;"></div>
        <div class="meteor" style="left: 75%; animation-duration: 2.1s; animation-delay: 2.5s;"></div>
        <div class="meteor" style="left: 90%; animation-duration: 3.5s; animation-delay: 1.2s;"></div>
      </div>

      <img src="/assets/images/logo-home.png" alt="El Arca" class="hero-logo">
      <h1 class="hero-title">
        Restaurante Bar <br>
        <span class="text-wave" style="font-family: var(--font-hero); font-weight: 700; letter-spacing: -2px;">El
          Arca</span>
      </h1>
      <p class="hero-subtitle">
        Naturaleza · Gastronomía · Experiencia Premium
      </p>
    </section>

    <section class="section section-intro reveal-on-scroll">
      <header class="section-header">
        <h2 class="text-glow">Una experiencia diferente</h2>
        <p>
          En El Arca combinamos gastronomía, naturaleza y momentos memorables.
        </p>
      </header>
    </section>

    <section class="section section-featured reveal-on-scroll">
      <header class="section-header">
        <h2 class="text-glow">Explora nuestras zonas</h2>
        <p>Selecciona una zona para conocer más detalles.</p>
      </header>

      <!-- New Vertical List Carousel -->
      <section class="slideshow">
        <!-- ZONAS -->
        <div class="zones reveal-on-scroll reveal-delay-2" id="zones">
          <div class="active-line" id="activeLine"></div>

          <div class="zone active" data-image="zona1">
            <h3>Terraza</h3>
            <p>Disfruta de la vista y el aire libre en nuestra terraza premium.</p>
          </div>

          <div class="zone" data-image="zona2">
            <h3>Fuente</h3>
            <p>Relájate con el sonido del agua en nuestra zona de fuentes.</p>
          </div>

          <div class="zone" data-image="zona3">
            <h3>Camastros</h3>
            <p>Comodidad y descanso bajo el sol.</p>
          </div>

          <div class="zone" data-image="zona4">
            <h3>Billar</h3>
            <p>Diviértete con amigos en nuestras mesas profesionales.</p>
          </div>

          <div class="zone" data-image="zona5">
            <h3>Zona de niños</h3>
            <p>Diversión segura para los más pequeños.</p>
          </div>

          <div class="zone" data-image="zona6">
            <h3>Carpas</h3>
            <p>Privacidad y confort para tu grupo.</p>
          </div>
        </div>

        <!-- IMAGEN -->
        <div class="image-box">
          <!-- Replacing placeholders with likely relevant images. 
                 Using existing images from list if possible or generic placeholders.
                 I will map them to reasonable existing files. -->
          <img src="/assets/images/imgTerraza.png" class="active" data-id="zona1">
          <img src="/assets/images/imagenJardin.png" data-id="zona2"> <!-- Jardin/Fuente approximation -->
          <img src="/assets/images/imagenInterior.png" data-id="zona3"> <!-- Camastros approximation -->
          <img src="/assets/images/Ambinte.jpg" data-id="zona4"> <!-- Billar approximation -->
          <img src="/assets/images/img4.jpg" data-id="zona5"> <!-- Kids approximation -->
          <img src="/assets/images/of3.jpg" data-id="zona6"> <!-- Carpas approximation -->
        </div>
      </section>
    </section>

    <!-- Script for Carousel -->
    <script>
      document.addEventListener('DOMContentLoaded', () => {
        const zones = document.querySelectorAll(".zone");
        const images = document.querySelectorAll(".image-box img");
        const activeLine = document.getElementById("activeLine");

        function moveLine(element) {
          if (!element) return;
          const rect = element.getBoundingClientRect();
          const parent = document.getElementById("zones");
          const parentRect = parent.getBoundingClientRect();

          // Calculate relative position
          activeLine.style.top = (rect.top - parentRect.top) + "px";
          activeLine.style.height = rect.height + "px";
        }

        function activateZone(zone) {
          zones.forEach(z => z.classList.remove("active"));
          zone.classList.add("active");

          const id = zone.dataset.image;
          images.forEach(img => {
            img.classList.toggle("active", img.dataset.id === id);
          });

          moveLine(zone);
        }

        zones.forEach(zone => {
          zone.addEventListener("mouseenter", () => activateZone(zone));
          zone.addEventListener("click", () => activateZone(zone));
        });

        // Auto-play feature (optional but requested behavior "Cambia automáticamente al siguiente")
        let currentIndex = 0;
        let intervalId;

        function nextSlide() {
          currentIndex = (currentIndex + 1) % zones.length;
          activateZone(zones[currentIndex]);
        }

        function startAutoPlay() {
          intervalId = setInterval(nextSlide, 3500); // 3.5 seconds per slide
        }

        function stopAutoPlay() {
          clearInterval(intervalId);
        }

        // Initial position
        moveLine(document.querySelector(".zone.active"));

        // Start Autoplay
        startAutoPlay();

        // Pause on hover
        const slideshow = document.querySelector('.slideshow');
        slideshow.addEventListener('mouseenter', stopAutoPlay);
        slideshow.addEventListener('mouseleave', startAutoPlay);

        // Update line position on resize
        window.addEventListener('resize', () => {
          const active = document.querySelector(".zone.active");
          moveLine(active);
        });
      });
    </script>

    <section class="section section-cta reveal-on-scroll">
      <!-- Image changed to principal_reservaciones.webp, glass only on box -->
      <div class="cta-box glass-panel"
        style="padding: 3rem; text-align: center; max-width: 600px; margin: 0 auto; position: relative; overflow: hidden; background: rgba(255,255,255,0.05);">

        <div style="position: relative; z-index: 2;">
          <h2 class="text-glow">¿Listo para visitarnos?</h2>
          <p style="margin-bottom: 2rem;">Reserva tu mesa y vive la experiencia El Arca.</p>

          <a href="/?view=reservaciones" class="btn btn-animated">
            <span class="text">Reservar ahora</span>
          </a>
        </div>

        <!-- Background Image specific to CTA box as requested -->
        <div class="cta-bg-img"
          style="position: absolute; inset: 0; background-image: url('/assets/images/principal_reservaciones.webp'); background-size: cover; background-position: center; opacity: 0.3; z-index: -1;">
        </div>
      </div>
    </section>

  </main>

  <footer class="site-footer">
    <div class="footer-inner">
      <img src="/assets/images/logo-footer.jpg" alt="El Arca" class="footer-logo">
      <p class="footer-text">© 2025 Restaurante Bar El Arca — Donde la naturaleza y la gastronomía se encuentran.</p>
    </div>
  </footer>


  <div id="mobile-floating-cta" class="mobile-only">
    <div class="floating-cta-text">
      <span class="top">Reservación Rápida</span>
      <span class="bot">Reserva tu mesa ahora</span>
    </div>
    <a href="/?view=reservaciones" class="floating-cta-btn">Reservar</a>
  </div>

  <script src="/assets/js/mobile-enhancements.js"></script>
</body>

</html>