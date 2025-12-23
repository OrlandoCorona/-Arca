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
    <img src="/assets/images/user.png" width="30" alt="Usuario">
  </a>
  <a href="/?action=logout">
    <img src="/assets/images/logout.png" width="30" alt="Salir">
  </a>
</div>
    <div class="container">
        <h1>Cervezas</h1>
        <div class="product-list">
            <div class="product" data-name="XX Lager 1.2L" data-price="69$" data-img="/assets/images/xx.jpg" data-desc="Una cerveza ligera y refrescante.">
                <h2>XX Lager 1.2L</h2>
                <p>69$</p>
            </div>
            <div class="product" data-name="Victoria 1.2L" data-price="69$" data-img="/assets/images/victoria12L.png" data-desc="Cerveza de cuerpo medio y sabor balanceado.">
                <h2>Victoria 1.2L</h2>
                <p>69$</p>
            </div>
            <div class="product" data-name="Corona 1.2L" data-price="$69" data-img="/assets/images/corona12L.png" data-desc="Cerveza clara y refrescante, ideal para cualquier ocasión.">
                <h2>Corona 1.2L</h2>
                <p>$69</p>

            </div>
            <div class="product" data-name="Modelo Especial 1L" data-price="$79" data-img="/assets/images/modeloespecial.png" data-desc="Cerveza pilsner con un sabor único y distintivo.">
                <h2>Modelo Especial 1L</h2>
                <p>$79</p>
            </div>
            <div class="product" data-name="Negra Modelo 1L" data-price="$79" data-img="/assets/images/nm.jpg" data-desc="Cerveza oscura con un sabor rico y complejo.">
                <h2>Negra Modelo 1L</h2>
                <p>$79</p>
            </div>
            <div class="product" data-name="Tecate 1.2L" data-price="$69" data-img="/assets/images/tecate12L.png" data-desc="Cerveza con carácter y sabor intenso.">
                <h2>Tecate 1.2L</h2>
                <p>$69</p>
            </div>
            <div class="product" data-name="Indio 1.2L" data-price="$69" data-img="/assets/images/indio25L.png" data-desc="Cerveza ámbar con un sabor único y distintivo.">
                <h2>Indio 1.2L</h2>
                <p>$69</p>
            </div>
            <div class="product" data-name="XX Lager 325ml" data-price="$40" data-img="/assets/images/xxlager.png" data-desc="Una cerveza ligera y refrescante en tamaño pequeño.">
                <h2>XX Lager 325ml</h2>
                <p>$40</p>
            </div>
            <div class="product" data-name="Victoria 355ml" data-price="$40" data-img="/assets/images/victoria355.png" data-desc="Cerveza de cuerpo medio y sabor balanceado en tamaño pequeño.">
                <h2>Victoria 355ml</h2>
                <p>$40</p>
            </div>
            <div class="product" data-name="Corona 355ml" data-price="$40" data-img="/assets/images/corona355.png" data-desc="Cerveza clara y refrescante en tamaño pequeño.">
                <h2>Corona 355ml</h2>
                <p>$40</p>
            </div>
            <div class="product" data-name="Modelo Especial 355ml" data-price="$40" data-img="/assets/images/modeloespecial355.png" data-desc="Cerveza pilsner con un sabor único y distintivo en tamaño pequeño.">
                <h2>Modelo Especial 355ml</h2>
                <p>$40</p>
            </div>
            <div class="product" data-name="Negra Modelo 355ml" data-price="$40" data-img="/assets/images/modeloespecial355Negra.png" data-desc="Cerveza oscura con un sabor rico y complejo en tamaño pequeño.">
                <h2>Negra Modelo 355ml</h2>
                <p>$40</p>
            </div>
            <div class="product" data-name="Tecate 355ml" data-price="$40" data-img="/assets/images/tecate355.png" data-desc="Cerveza con carácter y sabor intenso en tamaño pequeño.">
                <h2>Tecate 355ml</h2>
                <p>$40</p>
            </div>
            <div class="product" data-name="Indio 355ml" data-price="$40" data-img="/assets/images/indio355.png" data-desc="Cerveza ámbar con un sabor único y distintivo en tamaño pequeño.">
                <h2>Indio 355ml</h2>
                <p>$40</p>
            </div>
        </div>
    </div>

<div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 id="modalName"></h2>
            <img id="modalImg" src="" alt="Imagen del producto">
            <p id="modalDesc"></p>
            <p id="modalPrice"></p>
        </div>
    </div>

    <script>
        document.querySelectorAll('.product').forEach(item => {
            item.addEventListener('click', () => {
                document.getElementById('modalName').innerText = item.getAttribute('data-name');
                document.getElementById('modalImg').src = item.getAttribute('data-img');
                document.getElementById('modalDesc').innerText = item.getAttribute('data-desc');
                document.getElementById('modalPrice').innerText = item.getAttribute('data-price');
                document.getElementById('myModal').style.display = 'block';
            });
        });

        document.querySelector('.close').addEventListener('click', () => {
            document.getElementById('myModal').style.display = 'none';
        });

        window.onclick = function(event) {
            if (event.target === document.getElementById('myModal')) {
                document.getElementById('myModal').style.display = 'none';
            }
        }
    </script>
</body>
</html>