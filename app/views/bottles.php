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
  <title>El Arca</title>
  <link rel="stylesheet" href="/assets/css/styles.css">
</head>

<body>

  <?php require __DIR__ . '/partials/navbar.php'; ?>
<div class="menu">
    <a href="/?view=home">Inicio</a>
    <a href="/?view=menu">Menú</a>
    <a href="/?view=reservaciones">Reservaciones</a>
    <a href="/?view=perfil">
        <img src="/assets/images/user.png" width="30" height="30" alt="Perfil">
    </a>
    <a href="/?action=logout">
        <img src="/assets/images/logout.png" width="30" height="30" alt="Salir">
    </a>
</div>

<div class="container">
    <h1>Botellas y Copeo</h1>

    <div class="product-list">
        <div class="product" data-name="Tequila Don Julio" data-price="$1,200" data-desc="Botella 750ml" data-img="/assets/images/donjulio.png">
            <h2>Don Julio</h2>
            <p>$1,200</p>
        </div>

        <div class="product" data-name="Buchanan's 12" data-price="$1,400" data-desc="Whisky 750ml" data-img="/assets/images/buchanans.png">
            <h2>Buchanan's 12</h2>
            <p>$1,400</p>
        </div>

        <div class="product" data-name="José Cuervo Especial" data-price="$900" data-desc="Tequila 750ml" data-img="/assets/images/cuervo.png">
            <h2>José Cuervo</h2>
            <p>$900</p>
        </div>

        <div class="product" data-name="Bacardí Blanco" data-price="$850" data-desc="Ron 750ml" data-img="/assets/images/bacardi.png">
            <h2>Bacardí</h2>
            <p>$850</p>
        </div>
    </div>
</div>

<!-- MODAL -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2 id="modalName"></h2>
        <img id="modalImg" src="">
        <p id="modalDesc"></p>
        <p id="modalPrice"></p>
    </div>
</div>

<footer>
    <p>
        © 2024 Restaurante-Bar El Arca<br>
        <img src="/assets/images/inconoB.jpg" width="30" height="30" alt="El Arca">
    </p>
</footer>

<script>
document.querySelectorAll('.product').forEach(item => {
    item.addEventListener('click', () => {
        document.getElementById('modalName').innerText = item.dataset.name;
        document.getElementById('modalImg').src = item.dataset.img;
        document.getElementById('modalDesc').innerText = item.dataset.desc;
        document.getElementById('modalPrice').innerText = item.dataset.price;
        document.getElementById('myModal').style.display = 'flex';
    });
});

document.querySelector('.close').onclick = () => {
    document.getElementById('myModal').style.display = 'none';
};

window.onclick = e => {
    if (e.target === document.getElementById('myModal')) {
        document.getElementById('myModal').style.display = 'none';
    }
};
</script>

</body>
</html>
