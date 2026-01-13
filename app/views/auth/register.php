<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear cuenta — El Arca</title>
  <link rel="stylesheet" href="/assets/css/styles.css?v=2025-01">
  <link rel="preload" as="image" href="/assets/images/login-bg.webp" fetchpriority="high">

  <style>
    /* Estilos específicos para el flow de registro */
    .step-container {
      display: none;
      animation: fadeIn 0.4s ease;
    }

    .step-container.active {
      display: block;
    }

    .hidden {
      display: none !important;
    }

    /* Input con icono de ojo para contraseña */
    .password-wrapper {
      position: relative;
    }

    .password-toggle {
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: var(--text-muted);
      background: none;
      border: none;
      font-size: 1.1rem;
    }

    /* Modal Simulación Email */
    .modal-overlay {
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, 0.8);
      z-index: 9999;
      display: none;
      align-items: center;
      justify-content: center;
      backdrop-filter: blur(5px);
    }

    .modal-overlay.active {
      display: flex;
    }

    .modal-box {
      background: #0f172a;
      border: 1px solid rgba(0, 243, 255, 0.2);
      padding: 2rem;
      border-radius: 16px;
      max-width: 400px;
      text-align: center;
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
    }

    .modal-icon {
      font-size: 3rem;
      margin-bottom: 1rem;
    }

    .modal-btn {
      margin-top: 1.5rem;
      width: 100%;
    }
  </style>

  <!-- Google Maps API Placeholder - Replace YOUR_API_KEY with real key when relocating -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places&callback=initAutocomplete"
    async defer></script>
</head>

<body class="auth-page auth-strict-layout">

  <main class="auth-bg">
    <img src="/assets/images/login-bg.webp" alt="" class="auth-bg-img" loading="eager" fetchpriority="high"
      decoding="async">

    <div class="auth-glass">
      <div class="auth-logo-wrapper">
        <img src="/assets/images/logo-auth-top.jpg" alt="El Arca" class="auth-logo" decoding="async">
      </div>

      <h2 class="auth-title">Crear cuenta</h2>

      <form method="POST" action="/?action=register" class="auth-form" id="registerForm" autocomplete="on">

        <!-- HIDDEN INPUTS FOR BACKEND COMPATIBILITY -->
        <input type="hidden" name="nombre" id="real_nombre">
        <input type="hidden" name="apellido_paterno" id="real_paterno">
        <input type="hidden" name="apellido_materno" id="real_materno">

        <!-- STEP 1: CONTACTO -->
        <div id="step1" class="step-container active">
          <div class="form-group">
            <input type="text" id="nombre_completo" required placeholder=" " autocomplete="name">
            <label for="nombre_completo">Nombre Completo</label>
            <small
              style="color:rgba(255,255,255,0.5); font-size:0.75rem; display:block; text-align:left; margin-top:4px;">Ej.
              Juan Pablo Pérez López</small>
          </div>

          <div class="form-group">
            <input type="email" id="correo" name="correo" required placeholder=" " autocomplete="email">
            <label for="correo">Correo electrónico</label>
          </div>

          <div class="form-group">
            <input type="tel" id="telefono" name="telefono" required placeholder=" " autocomplete="tel">
            <label for="telefono">Teléfono</label>
          </div>

          <button type="button" class="btn btn-animated" id="btnContinue">
            <span class="text">Continuar</span>
          </button>
        </div>

        <!-- STEP 2: SEGURIDAD Y UBICACIÓN -->
        <div id="step2" class="step-container">

          <!-- Password -->
          <div class="form-group password-wrapper">
            <input type="password" id="contrasena" name="contrasena" required placeholder=" "
              autocomplete="new-password">
            <label for="contrasena">Contraseña</label>
            <button type="button" class="password-toggle" onclick="togglePass('contrasena')">👁️</button>
          </div>

          <div class="form-group password-wrapper">
            <input type="password" id="repetir_contrasena" name="repetir_contrasena" required placeholder=" "
              autocomplete="new-password">
            <label for="repetir_contrasena">Repetir contraseña</label>
            <button type="button" class="password-toggle" onclick="togglePass('repetir_contrasena')">👁️</button>
          </div>
          <span id="passError" style="color:#ff6b6b; font-size:0.8rem; display:none;">Las contraseñas no
            coinciden</span>

          <!-- Address Breakdown -->
          <h4 style="color:var(--primary); font-size:0.9rem; margin:1rem 0 0.5rem; text-align:left;">Domicilio</h4>

          <!-- Autocomplete Helper -->
          <div class="form-group">
            <input type="text" id="autocomplete_search" placeholder=" " autocomplete="off">
            <label for="autocomplete_search">Buscar dirección (Google Maps)</label>
          </div>

          <div class="form-group">
            <!-- Backend expects 'domicilio' text, we will combine or use this as main street -->
            <input type="text" name="domicilio" id="calle" placeholder=" " required autocomplete="address-line1">
            <label for="calle">Calle y Número</label>
          </div>

          <div style="display:flex; gap:0.5rem;">
            <div class="form-group" style="flex:1;">
              <input type="text" id="num_int" placeholder=" ">
              <label for="num_int">N. Int (Op)</label>
            </div>
            <div class="form-group" style="flex:1;">
              <input type="text" id="municipio" placeholder=" ">
              <label for="municipio">Municipio</label>
            </div>
          </div>

          <div class="form-group">
            <input type="text" id="ciudad" placeholder=" ">
            <label for="ciudad">Ciudad</label>
          </div>

          <button type="submit" class="btn btn-animated" id="btnFinalSubmit">
            <span class="text">Finalizar Registro</span>
          </button>

          <button type="button" class="btn-back" onclick="goToStep(1)"
            style="margin-top:1rem; background:none; border:none; cursor:pointer;">
            ← Volver
          </button>
        </div>

      </form>

      <div class="auth-links">
        <p>
          ¿Ya tienes cuenta?
          <a href="/?view=login">Inicia sesión</a>
        </p>
      </div>

    </div>
  </main>

  <footer class="site-footer auth-footer">
    <img src="/assets/images/logo-auth-footer.jpg" alt="El Arca">
    <p>© 2024 Restaurante Bar El Arca</p>
  </footer>

  <!-- Mock Email Modal -->
  <div class="modal-overlay" id="emailModal">
    <div class="modal-box">
      <div class="modal-icon">📧</div>
      <h3 style="color:#fff; margin-bottom:0.5rem;">Verifica tu correo</h3>
      <p style="color:var(--text-muted); font-size:0.9rem;">
        Hemos enviado un enlace de confirmación a <strong id="modalEmailDisplay"
          style="color:var(--primary);"></strong>.
      </p>
      <p style="color:var(--text-muted); font-size:0.8rem; margin-top:1rem;">
        (Simulación: Haz clic abajo para "verificar")
      </p>

      <button class="btn btn-primary modal-btn" onclick="verifyEmailAction()">
        Confirmar Email
      </button>
    </div>
  </div>

  <script>
    // --- Logic for Steps ---
    function goToStep(step) {
      document.querySelectorAll('.step-container').forEach(el => el.classList.remove('active'));
      document.getElementById('step' + step).classList.add('active');
    }

    // --- Step 1 Validation & Email Mock ---
    document.getElementById('btnContinue').addEventListener('click', () => {
      const name = document.getElementById('nombre_completo');
      const email = document.getElementById('correo');
      const phone = document.getElementById('telefono');

      if (!name.value || !email.value || !phone.value) {
        alert("Por favor completa todos los campos de contacto");
        return;
      }

      // Show Modal
      document.getElementById('modalEmailDisplay').textContent = email.value;
      document.getElementById('emailModal').classList.add('active');
    });

    function verifyEmailAction() {
      document.getElementById('emailModal').classList.remove('active');
      goToStep(2);
    }

    // --- Password Toggle ---
    function togglePass(id) {
      const el = document.getElementById(id);
      el.type = el.type === 'password' ? 'text' : 'password';
    }

    // --- Submit Logic (Name Splitting) ---
    document.getElementById('registerForm').addEventListener('submit', function (e) {
      const p1 = document.getElementById('contrasena').value;
      const p2 = document.getElementById('repetir_contrasena').value;

      if (p1 !== p2) {
        e.preventDefault();
        document.getElementById('passError').style.display = 'block';
        return;
      }

      // Split Name
      const fullName = document.getElementById('nombre_completo').value.trim();
      const parts = fullName.split(' ');

      let rName = '', rPat = '', rMat = '';

      if (parts.length === 1) {
        rName = parts[0];
        rPat = '.'; // Backend might require it
      } else if (parts.length === 2) {
        rName = parts[0];
        rPat = parts[1];
      } else if (parts.length === 3) {
        rName = parts[0];
        rPat = parts[1];
        rMat = parts[2];
      } else {
        // 4+ parts: First 2 are name (probably), last 2 are surnames
        // Heuristic: Everything except last 2 is Name.
        rMat = parts.pop();
        rPat = parts.pop();
        rName = parts.join(' ');
      }

      document.getElementById('real_nombre').value = rName;
      document.getElementById('real_paterno').value = rPat;
      document.getElementById('real_materno').value = rMat;

      // Note: 'domicilio' input already has name="domicilio", which backend expects.
      // We can optionally append city/municipio to it if backend only has 1 field.
      // Assuming backend only has 'domicilio', let's combine for safety:
      const calle = document.getElementById('calle').value;
      const num = document.getElementById('num_int').value;
      const mun = document.getElementById('municipio').value;
      const cd = document.getElementById('ciudad').value;

      // Overwrite the main input with full address just in case
      // Or rely on the user typing strictly in 'calle'.
      // Best bet: Append details to 'domicilio' value
      const fullAddress = `${calle} ${num ? 'Int ' + num : ''}, ${mun}, ${cd}`;
      // We'll update the main input so backend gets full string
      document.getElementById('calle').value = fullAddress;
    });

    // --- Google Maps Autocomplete Placeholder ---
    function initAutocomplete() {
      const input = document.getElementById('autocomplete_search');
      // In production, this would initialize properly with valid key
      if (google && google.maps && google.maps.places) {
        const autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.addListener('place_changed', function () {
          const place = autocomplete.getPlace();
          // Logic to populate fields
          // console.log(place);
          // Mock population for now:
          if (place.address_components) {
            // Parse components...
          }
        });
      }
    }
  </script>

</body>

</html>