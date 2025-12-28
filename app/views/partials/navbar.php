<?php
// app/views/partials/navbar.php
?>
<nav class="navbar">
  <div class="navbar-inner">

    <!-- BRAND -->
    <a href="/?view=home" class="brand">
      <img src="/assets/images/logo-navbar.jpg" alt="El Arca" class="nav-brand-logo">
      <span>El Arca</span>
    </a>

    <!-- LINKS PRINCIPALES -->
    <ul class="nav-links">

      <li>
        <a href="/?view=home" class="nav-link nav-home">
          <img src="/assets/images/home.png" alt="Inicio">
          <span>Inicio</span>
        </a>
      </li>

      <li>
        <a href="/?view=menu" class="nav-link nav-menu">
          <img src="/assets/images/menu.png" alt="Menú">
          <span>Menú</span>
        </a>
      </li>

      <li>
        <a href="/?view=reservaciones" class="nav-link nav-reservaciones">
          <img src="/assets/images/reservaciones.png" alt="Reservaciones">
          <span>Reservaciones</span>
        </a>
      </li>

    </ul>

    <!-- ACCIONES DERECHA -->
    <div class="nav-actions">

      <a href="/?view=perfil" class="nav-link nav-perfil">
        <img src="/assets/images/perfil.png" alt="Perfil">
        <span>Perfil</span>
      </a>

      <a href="/?action=logout" class="nav-link danger">
        <img src="/assets/images/logout.png" alt="Salir">
        <span>Salir</span>
      </a>
    </div>

  </div>
</nav>
