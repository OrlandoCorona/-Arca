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
  <div class="carousel">
    <div class="carousel-container">
      <div class="carousel-item">
        <div class="card">
          <h1>Restaurante Bar El Arca</h1>
          <p>
            Sumérgete en un oasis gastronómico, donde la frescura se fusiona
            con la naturaleza.
          </p>
          <img src="/assets/images/inicio10.png" alt="Ambiente del Restaurante-Bar" width="460px" height="460px" />
        </div>
      </div>
      <div class="carousel-item">
        <div class="card">
          <h2>Promociones</h2>
          <img src="/assets/images/of1.jpg" alt="Promoción 1" width="300px" height="300px" />
          <img src="/assets/images/inicio5.jpg" alt="Promoción 2" width="250px" height="250px" />
          <img src="/assets/images/of3.jpg" alt="Promoción 3" width="300px" height="300px" />
          <p></p>
        </div>
      </div>
      <div class="carousel-item">
        <div class="card">
          <h2>EL ARCA</h2>
          <img src="/assets/images/inicio1.jpg" alt="Promoción 4" width="300px" height="300px" />
          <img src="/assets/images/inicio2.jpg" alt="Promoción 5" width="300px" height="300px" />
          <img src="/assets/images/inicio1.jpg" alt="Promoción 6" width="300px" height="300px" />
          <p></p>
        </div>
      </div>
      <div class="carousel-item">
        <div class="card">
          <h2>Eventos</h2>
          <img src="/assets/images/inicio3.jpg" alt="Promoción 7" width="250px" height="250px" />
          <img src="/assets/images/of2.jpg" alt="Promoción 8" width="400px" height="400px" />
          <img src="/assets/images/inicio3.jpg" alt="Promoción 9" width="250px" height="250px" />
          <p></p>
        </div>
      </div>
      <div class="carousel-item" id="openModal">
        <div class="card">
          <h2>Descubre Nuestro Ambiente</h2>
          <img src="/assets/images/inicio6.jpg" alt="Promoción 10" width="300px" height="300px" />
          <img src="/assets/images/Ambiente.jpg" alt="Ambiente del Restaurante-Bar" width="400px" height="400px" />
          <img src="/assets/images/inicio7.jpg" alt="Promoción 11" width="300px" height="300px" />
        </div>
      </div>
      <div class="carousel-item">
        <div class="card">
          <h2>Zonas</h2>
          <img src="/assets/images/zonas.png" alt="Zonas" width="80px" height="80px" />
          <p>
            Contamos con una amplia variedad de zonas para que puedan venir a
            disfrutar con su familia. <br />
            Desde áreas de picnic con sombra, hasta zonas de juegos para niños
            y áreas especiales para eventos privados, tenemos todo lo que
            necesitas para una experiencia inolvidable. <br />
            Nuestras zonas están diseñadas para ofrecer comodidad y diversión,
            permitiéndote relajarte y disfrutar de la naturaleza mientras los
            niños juegan en un entorno seguro.
          </p>
          <img src="/assets/images/imgInterior.png" alt="Zonas" width="250px" height="50px" />
          <img src="/assets/images/imgTerraza.png" alt="Zonas" width="250px" height="50px" />
          <img src="/assets/images/imgJardin.png" alt="Zonas" width="250px" height="50px" />
        </div>
      </div>
      <div class="carousel-item">
        <div class="card">
          <h2>Misión</h2>
          <img src="/assets/images/mision.png" alt="Mision" width="80px" height="80px" />
          <p>
            Crear momentos inolvidables en un entorno al aire libre,
            ofreciendo experiencias gastronómicas únicas. <br />
            Nos esforzamos por proporcionar un servicio de alta calidad y una
            cocina excepcional, utilizando ingredientes frescos y locales.
            <br />
            Nuestro compromiso es con la sostenibilidad y el respeto por el
            medio ambiente, asegurando que cada visita no solo sea placentera,
            sino también responsable. <br />
            Queremos que cada cliente sienta que es parte de nuestra familia y
            disfrute de cada momento con nosotros.
          </p>
          <img src="/assets/images/inicio10.png" alt="Vision" width="200px" height="200px" />
          <img src="/assets/images/inicio8.jpg" alt="Mision" width="300px" height="300px" />
          <img src="/assets/images/inicio10.png" alt="Vision" width="200px" height="200px" />
        </div>
      </div>
      <div class="carousel-item">
        <div class="card">
          <h2>Visión</h2>
          <img src="/assets/images/vision.png" alt="Vision" width="80px" height="80px" />
          <p>
            Convertirnos en el rincón gastronómico al aire libre por
            excelencia, destacando por la combinación de sabores excepcionales
            y un servicio inigualable. <br />
            Imaginamos un futuro donde seamos reconocidos por nuestra
            innovación culinaria y nuestro compromiso con la comunidad. <br />
            Aspiramos a expandir nuestras zonas y servicios, ofreciendo cada
            vez más opciones para nuestros clientes. <br />
            Nuestra visión es ser el destino preferido para aquellos que
            buscan una experiencia gastronómica única en un entorno natural y
            acogedor.
          </p>
          <img src="/assets/images/inicio10.png" alt="Vision" width="200px" height="200px" />
          <img src="/assets/images/inicio9.jpg" alt="Vision" width="300px" height="300px" />
          <img src="/assets/images/inicio10.png" alt="Vision" width="200px" height="200px" />
        </div>
      </div>
    </div>
    <div class="carousel-nav">
      <img id="prevBtn" src="/assets/images/izquierda.png" alt="Anterior" class="nav-btn" />
      <img id="nextBtn" src="/assets/images/derecha.png" alt="Siguiente" class="nav-btn" />
    </div>
  </div>

  <!-- Modal -->
  <div id="myModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">Información sobre el Restaurante</div>
      <div class="modal-body">
        <p>
          Bienvenido a El Arca, un lugar donde podrás disfrutar de una
          experiencia gastronómica única en un entorno natural...
        </p>
        <div class="image-row">
          <img src="/assets/images/img1.jpg" alt="Imagen 1" />
          <img src="/assets/images/img2.jpg" alt="Imagen 2" width="400px" height="400px" />
          <img src="/assets/images/img3.jpg" alt="Imagen 3" />
          <img src="/assets/images/img4.jpg" alt="Imagen 4" />
          <img src="/assets/images/img5.jpg" alt="Imagen 5" width="400px" height="400px" />
          <img src="/assets/images/img6.jpg" alt="Imagen 6" />
        </div>
      </div>
      <div class="modal-footer">
        <button id="closeModal">Cerrar</button>
      </div>
    </div>
  </div>

  <footer class="site-footer">
    <p>© 2024 Todos los derechos reservados. Restaurante-Bar El Arca</p>
  </footer>

  <script>
    let currentIndex = 0;
    const items = document.querySelectorAll(".carousel-item");
    const totalItems = items.length;
    const carouselContainer = document.querySelector(".carousel-container");

    function showNextItem() {
      currentIndex = (currentIndex + 1) % totalItems;
      updateCarousel();
    }

    function showPrevItem() {
      currentIndex = (currentIndex - 1 + totalItems) % totalItems;
      updateCarousel();
    }

    function updateCarousel() {
      const itemWidth = items[0].clientWidth;
      carouselContainer.style.transform = `translateX(-${currentIndex * itemWidth
        }px)`;
    }

    document
      .getElementById("nextBtn")
      .addEventListener("click", showNextItem);
    document
      .getElementById("prevBtn")
      .addEventListener("click", showPrevItem);

    //setInterval(showNextItem, 8000); // Cambia de item cada 8 segundos

    // Modal
    const modal = document.getElementById("myModal");
    const openModalBtn = document.getElementById("openModal");
    const closeModalBtn = document.getElementById("closeModal");

    openModalBtn.addEventListener("click", () => {
      modal.style.display = "flex";
    });

    closeModalBtn.addEventListener("click", () => {
      modal.style.display = "none";
    });

    // Cerrar el modal cuando se hace clic fuera del contenido
    window.addEventListener("click", (event) => {
      if (event.target === modal) {
        modal.style.display = "none";
      }
    });
  </script>
</body>

</html>