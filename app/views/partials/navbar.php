<?php
// app/views/partials/navbar.php
$currentView = $_GET['view'] ?? 'home';
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
        <a href="/?view=home"
           class="nav-link <?= $currentView === 'home' ? 'active' : '' ?>">
          <img src="/assets/images/icon-home.png" alt="Inicio">
          <span>Inicio</span>
        </a>
      </li>

      <li>
        <a href="/?view=menu"
           class="nav-link <?= $currentView === 'menu' || $currentView === 'food' ? 'active' : '' ?>">
          <img src="/assets/images/icon-menu.png" alt="Menú">
          <span>Menú</span>
        </a>
      </li>

      <li>
        <a href="/?view=reservaciones"
           class="nav-link <?= $currentView === 'reservaciones' ? 'active' : '' ?>">
          <img src="/assets/images/icon-reservaciones.png" alt="Reservaciones">
          <span>Reservaciones</span>
        </a>
      </li>

    </ul>

    <!-- ACCIONES DERECHA -->
    <div class="nav-actions">

      <a href="/?view=perfil"
         class="nav-link <?= $currentView === 'perfil' ? 'active' : '' ?>">
        <img src="/assets/images/icon-user.png" alt="Perfil">
        <span>Perfil</span>
      </a>

      <a href="/?action=logout" class="nav-link danger">
        <img src="/assets/images/icon-logout.png" alt="Salir">
        <span>Salir</span>
      </a>

    </div>

  </div>
</nav>
