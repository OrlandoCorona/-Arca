<?php
// app/views/partials/navbar.php
?>

<nav class="navbar">
  <div class="navbar-inner">

    <a href="/?view=home" class="brand">
      <span class="brand-mark">El Arca</span>
    </a>

    <a href="/?view=reservaciones" class="btn-primary nav-cta">
      Reservar ahora
    </a>

    <button class="nav-toggle" aria-label="Abrir menú">
      <span></span>
      <span></span>
      <span></span>
    </button>

    <ul class="nav-links">
      <li><a href="/?view=home">Inicio</a></li>
      <li><a href="/?view=menu">Menú</a></li>
      <li><a href="/?view=reservaciones">Reservaciones</a></li>

      <li class="nav-icons">
        <a href="/?view=perfil" aria-label="Perfil">
          <img src="/assets/images/user.png" alt="Perfil">
        </a>
        <a href="/?action=logout" aria-label="Salir">
          <img src="/assets/images/logout.png" alt="Salir">
        </a>
      </li>
    </ul>

  </div>
</nav>
