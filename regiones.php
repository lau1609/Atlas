<!DOCTYPE html>
<html lang="es">
<head>
<?php include_once("phpAssets/head.php"); ?>

<style>
  
  .fade-in {
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 1.5s ease-out, transform 1.5s ease-out;
}

.fade-in.show {
    opacity: 1;
    transform: translateY(0);
}
</style>
</head>
<body>
<header>
<?php include_once("phpAssets/header.php"); ?>
</header>

<!-- Banner Secundario con Carrusel -->
<section class="position-relative fade-in">
    <div class="carousel-inner">
        <!-- Slide 1 -->
        <div>
            <img src="_images/creel.jpg" alt="Bocoyna" class="img-fluid w-100 zoom-in">
            <div class="banner-overlay"></div>
            
            <!-- Contenedor central para texto y logotipo -->
            <div class="d-flex flex-column align-items-center justify-content-center position-absolute top-50 start-50 translate-middle text-center" style="z-index: 2;">
                <h2 class="fw-bold display-2 text-white">Descubre Bocoyna</h2> <br>
                <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed nisl eu lorem malesuada hendrerit et feugiat nisl. Phasellus condimentum mauris non purus tincidunt, sit amet iaculis metus mattis. Donec porta, ex at mollis pretium, justo lacus lacinia est, lacinia auctor ante mi non eros. Proin nisl odio, bibendum vel molestie ut, accumsan eget orci.</p>
                <div class="mt-3" style="width: 100px; height: 100px; background-color: rgba(0,0,0,0.5); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                    <img src="_images/SVG/icono_barrancas.png" alt="Logotipo" style="width: 60%; height: 60%;">
                </div>
                <p class="text-white display-6 fs-6">Region Barrancas de del cobre</p>
            </div>
        </div>
    </div>
</section>

<div class="container my-5 fade-in">
  <h2 class="text-center mb-4">Creel: Corazón de la Sierra Tarahumara</h2>
  <hr class="custom-hr"><br><br>
  <p class="text-center mb-5">
  Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed nisl eu lorem malesuada hendrerit et feugiat nisl. Phasellus condimentum mauris non purus tincidunt, sit amet iaculis metus mattis. Donec porta, ex at mollis pretium, justo lacus lacinia est, lacinia auctor ante mi non eros. Proin nisl odio, bibendum vel molestie ut, accumsan eget orci. Praesent aliquet nulla vulputate malesuada efficitur. Sed eleifend tincidunt fringilla. Vestibulum vehicula libero lorem, posuere sodales augue lacinia ac. Suspendisse mollis accumsan quam ut tristique.
  </p>
  <br>



  <div class="row text-center fade-in">
    <!-- Clima y Temperatura -->
    <div class="col-md-4 mb-4 card_anim">
      <div class="card border-0 shadow">
        <div class="card-body">
          <img src="_images/SVG/icono_clima.svg" alt="Icono Clima" class="mb-3" style="width: 60px;">
          <h5 class="card-title">Clima y Temperatura</h5>
          <p class="card-text">
          Tiene un clima templado-subhúmedo al encontrarse dentro de la zona boscosa. El verano es ligeramente cálido y húmedo con máximas de 25 °C a 30 °C y mínimas de 12 °C a 18 °C y el invierno es frío con máximas de 5 °C a 12 °C y mínimas de 0 °C a -10 °C. 
          </p>
        </div>
      </div>
    </div>

    <!-- Cultura -->
    <div class="col-md-4 mb-4 card_anim">
      <div class="card border-0 shadow">
        <div class="card-body">
          <img src="_images/SVG/icono_cultura.svg" alt="Icono Cultura" class="mb-3" style="width: 50px;">
          <h5 class="card-title">Cultura</h5>
          <p class="card-text">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. posuere sodales augue lacinia ac. Suspendisse mollis accumsan quam ut tristique tincidunt fringilla. Vestibulum vehicula libero lorem, posuere sodales augue lacinia ac.
          </p>
        </div>
      </div>
    </div>

    <!-- Naturaleza -->
    <div class="col-md-4 mb-4 card_anim">
      <div class="card border-0 shadow">
        <div class="card-body">
          <img src="_images/SVG/icono_naturaleza.svg" alt="Icono Naturaleza" class="mb-3" style="width: 40px;">
          <h5 class="card-title">Naturaleza</h5>
          <p class="card-text">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. posuere sodales augue lacinia ac. Suspendisse mollis accumsan quam ut tristique tincidunt fringilla. Vestibulum vehicula libero lorem, posuere sodales augue lacinia ac.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<section class="carrusel-atrac" style="background-color: #5C7812; padding: 50px 0; background-image: url('_images/textura_chihuahua_es_para_ti.svg');">
    <div class="container">
        <h2 class="text-white text-center mb-4 fw-bold">Atractivos turísticos</h2>

        <div id="carouselAtractivos" class="slick-carousel">
            <div class="card">
                <img src="_images/cascada_riukaso.png" class="card-img-top" alt="Cascada de Rukiraso">
                <div class="card-body bg-success text-white text-center">
                    <p><i class="bi bi-geo-alt"></i> Bocoyna</p>
                    <h5 class="fw-bold">Cascada de Rukiraso</h5>
                </div>
            </div>
            <a href="http://localhost/atlas/atractivos.php" class="text-decoration-none">
                <div class="card" style="cursor: pointer;">
                    <img src="_images/lago_arareko.png" class="card-img-top" alt="Lago Arareko">
                    <div class="card-body bg-success text-white text-center">
                        <p><i class="bi bi-geo-alt"></i> Bocoyna</p>
                        <h5 class="fw-bold">Lago Arareko</h5>
                    </div>
                </div>
            </a>

            <div class="card">
                <img src="_images/valle_hongos.png" class="card-img-top" alt="Valle de los Hongos">
                <div class="card-body bg-success text-white text-center">
                    
                        <p><i class="bi bi-geo-alt"></i> Bocoyna</p>
                    </a>
                    <h5 class="fw-bold">Valle de los Hongos</h5>
                </div>
            </div>
            <div class="card">
                <img src="_images/mision_sanignacio.jpeg" class="card-img-top" alt="Misión San Ignacio">
                <div class="card-body bg-success text-white text-center">
                    <p><i class="bi bi-geo-alt"></i> Bocoyna</p>
                    <h5 class="fw-bold">Misión San Ignacio</h5>
                </div>
            </div>
        </div>
    </div>
</section>



    <!-- Footer -->
    <footer class="py-5" style="background-color: #f0f0f0;">

<?php include_once("phpAssets/footer.php"); ?>


</footer>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Slick JS -->
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>

</body>
</html>