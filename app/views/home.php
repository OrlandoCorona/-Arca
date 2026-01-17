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
  <link
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    rel="stylesheet" />
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

      <!-- MOBILE EXPERIENCE (Horizontal Scroll) -->
      <div class="mobile-only-section">
        <div class="horizontal-scroll" style="padding-left: 1.5rem; padding-right: 1.5rem;">

          <!-- Card 1: Atmósfera -->
          <div class="card-glass-mobile featured">
            <div class="card-image" style="background-image: url('/assets/images/imgTerraza.png');"></div>
            <div class="flex items-center gap-2 mb-1"
              style="display: flex; gap: 0.5rem; align-items: center; margin-bottom: 0.5rem;">
              <span class="material-symbols-outlined" style="color: var(--secondary);">forest</span>
              <h3 style="color: white; font-size: 1.1rem; font-weight: 700;">Atmósfera</h3>
            </div>
            <p style="color: var(--text-muted); font-size: 0.9rem;">Rodeado de naturaleza y aire puro.</p>
          </div>

          <!-- Card 2: Familia -->
          <div class="card-glass-mobile">
            <div class="card-image" style="background-image: url('/assets/images/img4.jpg');"></div>
            <div class="flex items-center gap-2 mb-1"
              style="display: flex; gap: 0.5rem; align-items: center; margin-bottom: 0.5rem;">
              <span class="material-symbols-outlined" style="color: var(--secondary);">family_restroom</span>
              <h3 style="color: white; font-size: 1.1rem; font-weight: 700;">Familia</h3>
            </div>
            <p style="color: var(--text-muted); font-size: 0.9rem;">Diversión segura para los pequeños.</p>
          </div>

          <!-- Card 3: Gastronomía -->
          <div class="card-glass-mobile">
            <div class="card-image" style="background-image: url('/assets/images/of3.jpg');"></div>
            <div class="flex items-center gap-2 mb-1"
              style="display: flex; gap: 0.5rem; align-items: center; margin-bottom: 0.5rem;">
              <span class="material-symbols-outlined" style="color: var(--secondary);">restaurant</span>
              <h3 style="color: white; font-size: 1.1rem; font-weight: 700;">Sabor</h3>
            </div>
            <p style="color: var(--text-muted); font-size: 0.9rem;">Ingredientes frescos y cortes premium.</p>
          </div>

        </div>

        <!-- QUICK STATS GRID -->
        <div class="stats-grid" style="padding: 1.5rem;">
          <div class="stat-box">
            <div class="stat-icon">
              <span class="material-symbols-outlined">schedule</span>
            </div>
            <div>
              <p style="color: white; font-size: 0.8rem; font-weight: 600;">Horario</p>
              <p style="color: var(--text-muted); font-size: 0.75rem;">12:00 - 22:00</p>
            </div>
          </div>
          <div class="stat-box">
            <div class="stat-icon">
              <span class="material-symbols-outlined">location_on</span>
            </div>
            <div>
              <p style="color: white; font-size: 0.8rem; font-weight: 600;">Ubicación</p>
              <p style="color: var(--text-muted); font-size: 0.75rem;">Valle del Sol</p>
            </div>
          </div>
        </div>
      </div>

      <!-- DESKTOP EXPERIENCE (Vertical List) -->
      <section class="slideshow desktop-only-section">
        <!-- ZONAS -->
        <div class="zones reveal-on-scroll reveal-delay-2" id="zones">
          <div class="active-line" id="activeLine"></div>

          <div class="zone active" data-image="zona1">
            <h3>Terraza</h3>
            <p>Disfruta de la vista y el aire libre en nuestra terraza premium.</p>
            <div class="zone-details">
              <img src="/assets/images/imgTerraza.png" class="zone-img" alt="Terraza">
            </div>
          </div>

          <div class="zone" data-image="zona2">
            <h3>Fuente</h3>
            <p>Relájate con el sonido del agua en nuestra zona de fuentes.</p>
            <div class="zone-details">
              <img src="/assets/images/imagenJardin.png" class="zone-img" alt="Fuente">
            </div>
          </div>

          <div class="zone" data-image="zona3">
            <h3>Camastros</h3>
            <p>Comodidad y descanso bajo el sol.</p>
            <div class="zone-details">
              <img src="/assets/images/imagenInterior.png" class="zone-img" alt="Camastros">
            </div>
          </div>

          <div class="zone" data-image="zona4">
            <h3>Billar</h3>
            <p>Diviértete con amigos en nuestras mesas profesionales.</p>
            <div class="zone-details">
              <img src="/assets/images/Ambinte.jpg" class="zone-img" alt="Billar">
            </div>
          </div>

          <div class="zone" data-image="zona5">
            <h3>Zona de niños</h3>
            <p>Diversión segura para los más pequeños.</p>
            <div class="zone-details">
              <img src="/assets/images/img4.jpg" class="zone-img" alt="Zona de niños">
            </div>
          </div>

          <div class="zone" data-image="zona6">
            <h3>Carpas</h3>
            <p>Privacidad y confort para tu grupo.</p>
            <div class="zone-details">
              <img src="/assets/images/of3.jpg" class="zone-img" alt="Carpas">
            </div>
          </div>
        </div>
      </section>
    </section>

    <!-- Script for Carousel -->
    <script>
      document.addEventListener('DOMContentLoaded', () => {
        const zones = document.querySelectorAll(".zone");
        const activeLine = document.getElementById("activeLine");

        function moveLine(element) {
          if (!element) return;
          // Updates line position based on current element height (including expanded image)
          const rect = element.getBoundingClientRect();
          const parent = document.getElementById("zones");
          const parentRect = parent.getBoundingClientRect();

          activeLine.style.top = (rect.top - parentRect.top) + "px";
          activeLine.style.height = rect.height + "px";
        }

        function toggleZone(zone) {
          // Accordion behavior: close others
          zones.forEach(z => {
            if (z !== zone) z.classList.remove("active");
          });

          const isActive = zone.classList.contains("active");
          if (!isActive) {
            zone.classList.add("active");
          }

          // Recalculate line after a short delay to allow transition to start/end
          // or rely on transitionend? For smoothness we update immediately and maybe on transition end.
          moveLine(zone);
          setTimeout(() => moveLine(zone), 300); // Check again mid-transition
          setTimeout(() => moveLine(zone), 600); // Check after transition
        }

        zones.forEach(zone => {
          // Mouseenter only updates line position for hover effect, DOES NOT expand
          zone.addEventListener("mouseenter", () => {
            if (window.innerWidth > 768) {
              // Only move line if not mobile? Or always?
              // If we move line on hover, it might look weird if we don't click.
              // Let's keep line on ACTIVE zone only? 
              // User said: "Hover will preserve the 'active line' indicator"
              moveLine(zone);
            }
          });

          // On mouse leave, return to active zone
          zone.addEventListener("mouseleave", () => {
            const active = document.querySelector(".zone.active");
            if (active) moveLine(active);
          });

          // Click expands
          zone.addEventListener("click", () => toggleZone(zone));
        });

        // Initial position
        const active = document.querySelector(".zone.active");
        if (active) moveLine(active);

        // Update line position on resize
        window.addEventListener('resize', () => {
          const active = document.querySelector(".zone.active");
          moveLine(active);
        });
      });
    </script>

    <section class="section section-cta reveal-on-scroll desktop-only">
      <!-- Image changed to principal_reservaciones.webp, glass only on box -->
      <div class="cta-box glass-panel"
        style="padding: 3rem; text-align: center; max-width: 600px; margin: 0 auto; position: relative; overflow: hidden; background: rgba(255,255,255,0.05);">

        <div style="position: relative; z-index: 2;">
          <h2 class="text-glow">¿Listo para visitarnos?</h2>
          <p style="margin-bottom: 2rem;">Reserva tu mesa y vive la experiencia El Arca.</p>

          <a href="/?view=reservaciones" class="btn btn-premium">
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


  <!-- Floating CTA removed in favor of Bottom Nav -->

  <!-- iOS Bottom Navigation -->
  <nav class="bottom-nav">
    <a href="/?view=home" class="nav-item active">
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

  <script src="/assets/js/mobile-enhancements.js"></script>
</body>

</html>