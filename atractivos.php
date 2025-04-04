<!DOCTYPE html>
<html lang="es">
<head>
<?php include_once("phpAssets/head.php"); ?>
</head>
<body>
<header>
<?php include_once("phpAssets/header.php"); ?>
</header>

<!-- Banner Carrusel -->
<section class="position-relative">
    <div class="carousel-inner">
        <!-- Slide 1 -->
        <div>
            <img src="_images/creel.jpg" alt="Bocoyna" class="img-fluid w-100 zoom-in">
            <div class="banner-overlay"></div>
            
                  <!-- Contenedor central para texto y logotipo -->
          <div class="d-flex flex-column align-items-center justify-content-center position-absolute top-50 start-50 translate-middle text-center" style="z-index: 2;">
            <h2 class="fw-bold display-2 text-white">Descubre: Lago Arareko</h2> <br>
            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed nisl eu lorem malesuada hendrerit et feugiat nisl. Phasellus condimentum mauris non purus tincidunt, sit amet iaculis metus mattis. Donec porta, ex at mollis pretium, justo lacus lacinia est, lacinia auctor ante mi non eros. Proin nisl odio.posuere sodales augue lacinia ac. Suspendisse mollis accumsan quam ut tristique.</p>
            <!-- Logotipo en círculo negro con transparencia -->
            <div class="mt-3" style="width: 100px; height: 100px; background-color: rgba(0,0,0,0.5); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
              <img src="_images/SVG/icono_barrancas.png" alt="Logotipo" style="width: 60%; height: 60%;">
            </div>
            <p class="text-white display-6 fs-6">Region Barrancas de del cobre</p>
          </div>
        </div>
    </div>
</section>



<section class="carrusel-atrac" style="background-color: #5C7812; padding: 50px 0; background-image: url('_images/textura_chihuahua_es_para_ti.svg');">>

<div class=" container text-white col-md-12"> <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. 
        Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos unc vulputate libero et velit interdum, ac aliquet odio mattis ptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos unc vulputate Nunc vulputate libero et velit interdum, ac aliquet odio mattis. 
        Class aptent taciti sociosqu ad litora torquent per conubia nostra.
      </p>
    </div>
<div class="container my-5">
  <div class="row align-items-center">
    <!-- Galería con Carousel de Bootstrap -->
    <div class="col-md-6">
      <div id="galleryCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="_images\arareko1.jpg" class="d-block w-100 rounded" alt="Paisaje nevado">
          </div>
          <div class="carousel-item">
            <img src="_images\arareko2.jpg" class="d-block w-100 rounded" alt="Paisaje montañoso">
          </div>
          <div class="carousel-item">
            <img src="_images\arareko3.jpg" class="d-block w-100 rounded" alt="Bosque verde">
          </div>
        </div>
        <!-- Botones de navegación -->
        <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
      </div>
    </div>

    <!-- Descripción y Botón -->

    <div class="col-md-6 text-white p-4 rounded description-box">
      
      
      <p class="fw-bold mt-2">Horario:
      <p> Martes - domingo </p>
      <p> 10:00 a 4:00 pm. </p>
      <p class="fw-bold mt-2">Direccion:</p>
      <p> Zona Arquelogica de Paquimé,31850 Casas Grandes, Chih. </p>
      <p class="fw-bold mt-2">Telefono:</p>
      <p> 639-474-4068 </p>
      <p class="fw-bold mt-2">Precio de entrada:</p>
      <p>$50.00 Mxn</p>
      <img src="_images\logos\facebook.png" alt="Facebook" class="img-fluid" style="width: 40px;">
      <img src="_images\logos\instagram.png" alt="Instagram" class="img-fluid" style="width: 40px;"> <br>
      <a href="#" class="btn btn-success mt-3">¿Cómo llegar?</a>
    </div>
  </div>
</div>


    <div class="container " style=" max-width:1500px; !important;">
        <h2 class="text-white text-center mb-4 fw-bold "> Mas atractivos turísticos</h2>

        <div id="carouselAtractivos" class="slick-carousel">
            <div class="card">
                <img src="_images/cascada_riukaso.png" class="card-img-top" alt="Cascada de Rukiraso">
                <div class="card-body bg-success text-white text-center">
                    <p><i class="bi bi-geo-alt"></i> Bocoyna</p>
                    <h5 class="fw-bold">Cascada de Rukiraso</h5>
                </div>
            </div>
            <div class="card">
                <img src="_images/lago_arareko.png" class="card-img-top" alt="Lago Arareko">
                <div class="card-body bg-success text-white text-center">
                    <p><i class="bi bi-geo-alt"></i> Bocoyna</p>
                    <h5 class="fw-bold">Lago Arareko</h5>
                </div>
            </div>
            <div class="card">
                <img src="_images/valle_hongos.png" class="card-img-top" alt="Valle de los Hongos">
                <div class="card-body bg-success text-white text-center">
                    <p><i class="bi bi-geo-alt"></i> Bocoyna</p>
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