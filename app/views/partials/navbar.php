<?php
// app/views/partials/navbar.php
?>

<nav class="navbar">
  <div class="navbar-inner">

    <!-- BRAND -->
    <a href="/?view=home" class="brand">
      El Arca
    </a>

    <!-- LINKS -->
    <ul class="nav-links">
      <li>
        <a href="/?view=home" class="nav-item">
          <img src="/assets/images/home.png" alt="Inicio">
          <span>Inicio</span>
        </a>
      </li>
      <li>
        <a href="/?view=menu" class="nav-item">
          <img src="/assets/images/menu.png" alt="Menú">
          <span>Menú</span>
        </a>
      </li>
      <li>
        <a href="/?view=reservaciones" class="nav-item">
          <img src="/assets/images/reservaciones.png" alt="Reservaciones">
          <span>Reservaciones</span>
        </a>
      </li>
    </ul>

    <!-- CTA -->
    <a href="/?view=reservaciones" class="btn btn-animated nav-cta">
      <span class="text">Reservar ahora</span>
    </a>

    <!-- ICONOS PERFIL / SALIR -->
    <div class="nav-icons">
      <a href="/?view=perfil" class="nav-icon" aria-label="Perfil">
        <img src="/assets/images/user.png" alt="Perfil">
        <span>Perfil</span>
      </a>

      <a href="/?action=logout" class="nav-icon" aria-label="Salir">
        <img src="/assets/images/logout.png" alt="Salir">
        <span>Salir</span>
      </a>
    </div>

  </div>
</nav>
