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
      <li><a href="/?view=home">Inicio</a></li>
      <li><a href="/?view=menu">Menú</a></li>
      <li><a href="/?view=reservaciones">Reservaciones</a></li>
    </ul>

    <!-- CTA -->
    <a href="/?view=reservaciones" class="btn btn-animated nav-cta">
      <span class="text">Reservar ahora</span>
    </a>

    <!-- ICONOS -->
    <div class="nav-icons">
      <a href="/?view=perfil" aria-label="Perfil">
        <img src="/assets/images/user.png" alt="Perfil">
      </a>
      <a href="/?action=logout" aria-label="Salir">
        <img src="/assets/images/logout.png" alt="Salir">
      </a>
    </div>

  </div>
</nav>
