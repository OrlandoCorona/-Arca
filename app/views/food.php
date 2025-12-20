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
    <title>Comida - Restaurante-Bar El Arca</title>
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>

<div class="menu">
    <a href="/?view=home">Inicio</a>
    <a href="/?view=menu">Menú</a>
    <a href="/?view=reservaciones">Reservaciones</a>
    <a href="/?view=perfil">
        <img src="/assets/images/user.png" width="30">
    </a>
    <a href="/?action=logout">
        <img src="/assets/images/logout.png" width="30">
    </a>
</div>

    <div class="container">
        <h1>Comida</h1>
        <div class="product-list">
            <div class="product" data-name="Ensalada de Mariscos" data-price="$99" data-desc="Camarón y/o Pulpo." data-img="/assets/images/ensalada.png">
                <h2>Ensalada de Mariscos</h2>
                <p>$99</p>
                <p>Camarón y/o Pulpo.</p>
            </div>
            <div class="product" data-name="Gringa" data-price="$55" data-desc="Descripción del producto." data-img="/assets/images/gringas.png">
                <h2>Gringa</h2>
                <p>$55</p>
                <p>Descripción del producto.</p>
            </div>
            <div class="product" data-name="Club Sandwich" data-price="$110" data-desc="Descripción del producto." data-img="/assets/images/sand.png">
                <h2>Club Sandwich</h2>
                <p>$110</p>
                <p>Descripción del producto.</p>
            </div>
        </div>
    </div>

    <!-- Modal -->
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
        const products = document.querySelectorAll('.product');

        products.forEach(item => {
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
            if (event.target == document.getElementById('myModal')) {
                document.getElementById('myModal').style.display = 'none';
            }
        }
    </script>
</body>
</html>
