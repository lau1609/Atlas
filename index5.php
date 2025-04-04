<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atlas de Chihuahua</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .section-principal {
            background-color: #299BD7;
            color: white;
            position: relative;
            text-align: center;
            padding: 100px 20px;
            overflow: hidden;
        }

        .section-principal .background-image {
            position: absolute;
            top: 50%;
            left: 50%;
            width: auto;
            height: 100%;
            transform: translate(-50%, -50%);
            opacity: 0.8;
            z-index: 1;
        }

        .section-principal .content {
            position: relative;
            z-index: 2;
        }

        .section-principal img {
            
            margin-bottom: 20px;
        }

        /* Oscurecer la imagen del banner */
        .banner-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5); /* Oscurecimiento al 50% */
        z-index: 1;
    }

    /* Asegurar que el texto esté sobre la pleca oscura */
    .carousel-caption {
        z-index: 2;
        color: white;
    }

    /* Animación Zoom In */
    .zoom-in {
        animation: zoomIn 6s ease-in-out infinite alternate;
    }

    @keyframes zoomIn {
        0% {
            transform: scale(1);
        }
        100% {
            transform: scale(1.1);
        }
    }

    footer h5 {
        font-weight: bold;
        color: #6D6D6D;
    }

    footer p,
    footer ul li {
        font-size: 14px;
        color: #6D6D6D;
    }

    footer a {
        color: #6D6D6D;
        transition: color 0.3s ease;
    }

    footer a:hover {
        color: #000;
    }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid" style="height: 4em; padding-left: 4rem; padding-right: 4rem; ">
                <a class="navbar-brand" href="#">
                    <img src="_images/logos/lchihuahua_para_ti.png" alt="Logo Chihuahua para ti" style="max-height: 2em;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto fs-6 fw-bolder">
                        <li class="nav-item"><a class="nav-link" href="#">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Navega por el mapa</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Atractivos turisticos</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Sección Principal -->
    <section class="section-principal" style="height: 40em;">
        <img src="_images/catedral_inicio.jpg" alt="Fondo de sección" class="background-image">
        <div class="content" styles="border-radius: 250px;">
            <img src="_images/mapa_regiones.png" alt="Logo principal">
            <h1 class="display-4 fw-bold">Atlas de Chihuahua</h1>
        </div>
    </section>

<!-- Segunda Sección -->
<section class="container py-5 section-bg">
    <div class="row justify-content-center align-items-center">
        <!-- Contenedor de Texto -->
        <div class="col-md-6 order-md-1" style="max-width: 30em;">
            <h2 class="fw-bold text-start">CONOCE EL ATLAS DE CHIHUAHUA</h2>
            <hr>
            <p class="text-start">
                Rorem ipsum dolor sit amet, consectetur adipiscing elit. <br><br>
                Rorem ipsum dolor sit amet, consectetur adipiscing elit.Rorem ipsum dolor sit amet <br><br>
                Rorem ipsum dolor sit amet, consectetur adipiscing elit.Rorem ipsum dolor sit amet, consectetur adipiscing elit.Rorem ipsum dolor sit amet, consectetur adipiscing elit. <br><br>
                Rorem ipsum dolor sit amet, consectetur adipiscing elit.Rorem ipsum dolor sit amet, consectetur adipiscing elit. <br>
                Rorem ipsum dolor sit amet, consectetur adipiscing elit.
            </p>
        </div>
        <!-- Contenedor de Imagen -->
        <div class="col-md-6 order-md-2 text-center" style="max-width: 30em;">
            <img src="_images/catedral.png" alt="Catedral de Chihuahua" class="img-fluid rounded">
            <!-- Botón debajo de la imagen -->
            <div class="mt-3">
                <a href="#" class="btn btn-light border shadow-sm px-4 py-2 d-inline-flex align-items-center" style="border-radius: 12px;">
                    <!-- Ícono SVG -->
                    <span class="me-2 d-flex justify-content-center align-items-center" style="width: 24px; height: 24px; border-radius: 50%; background-color: #f0f0f0;">
                        <img src="_images/SVG/bx_map.svg" alt="Ícono de mapa" style="width: 16px; height: 16px;">
                    </span>
                    Navega por el mapa
                </a>
            </div>
        </div>
    </div>
</section>


<!-- Sección Atractivos Turísticos -->
<section class="py-5" style="background-color: #F4E8D9;">
    <div class="container">
        <div class="row">
            <!-- Tarjeta de texto introductorio -->
            <div class="col-md-3 mb-3">
                <div style="background-color: #F4E8D9;">
                    <div>
                        <h5 class="card-title" style="padding-bottom: 10px">Explora Chihuahua</h5>
                        <h2 class="mb-4">Atractivos Turísticos</h2>
                        <hr>
                        <p class="card-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla id posuere ex, vel scelerisque velit. In quis felis sit amet tellus congue mollis. Suspendisse mollis risus dictum metus dignissim, vitae pharetra massa auctor.
                        </p>
                        <br>
                        Quisque neque ante, lacinia id lectus vitae, ultrices rhoncus nibh. Quisque luctus hendrerit sem.
                    </div>
                </div>
            </div>
                        <!-- Carrusel -->
                        <div class="col-md-9">
                <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <!-- Tarjeta 1 -->
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card rounded-lg" style="background-color: #F4E8D9;">
                                        <img src="_images/paquime.jpg" alt="Paquimé" class="card-img-top">
                                        <div class="card-body">
                                            <h5 class="card-title">Basaseachi</h5>
                                            <p class="card-text">Casas Grandes, un sitio arqueológico impresionante.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 d-none d-md-block">
                                    <div class="card rounded-lg" style="background-color: #F4E8D9;">
                                        <img src="_images/bocoyna.png" alt="Bocoyna" class="card-img-top">
                                        <div class="card-body">
                                            <h5 class="card-title">Bocoyna</h5>
                                            <p class="card-text">Paisajes naturales únicos en el corazón de Chihuahua.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 d-none d-md-block">
                                    <div class="card rounded-lg" style="background-color: #F4E8D9;">
                                        <img src="_images/arareko.png" alt="Arareko" class="card-img-top">
                                        <div class="card-body">
                                            <h5 class="card-title">Arareko</h5>
                                            <p class="card-text">Un lugar lleno de historia y belleza natural.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Tarjeta 2 -->
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card rounded-lg" style="background-color: #F4E8D9;">
                                        <img src="_images/arareko.png" alt="Arareko 2" class="card-img-top">
                                        <div class="card-body">
                                            <h5 class="card-title">Arareko 2</h5>
                                            <p class="card-text">Otro rincón increíble para explorar.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 d-none d-md-block">
                                    <div class="card rounded-lg" style="background-color: #F4E8D9;">
                                        <img src="_images/paquime.jpg" alt="Paquimé 2" class="card-img-top">
                                        <div class="card-body">
                                            <h5 class="card-title">Paquimé 2</h5>
                                            <p class="card-text">Casas Grandes, un sitio arqueológico impresionante.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 d-none d-md-block">
                                    <div class="card rounded-lg" style="background-color: #F4E8D9;">
                                        <img src="_images/bocoyna.png" alt="Bocoyna 2" class="card-img-top">
                                        <div class="card-body">
                                            <h5 class="card-title">Bocoyna 2</h5>
                                            <p class="card-text">Paisajes naturales impresionantes.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery -->
<div class="container gallery mt-5">
  <div class="row">
    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
      <img src="_images/test1.webp" class="w-100 shadow-1-strong rounded mb-4" alt="Boat on Calm Water" />
      <img src="_images/test2.webp" class="w-100 shadow-1-strong rounded mb-4" alt="Wintry Mountain Landscape" />
    </div>

    <div class="col-lg-4 mb-4 mb-lg-0">
      <img src="_images/test4.webp" class="w-100 shadow-1-strong rounded mb-4" alt="Mountains in the Clouds" />
      <img src="_images/test3.webp" class="w-100 shadow-1-strong rounded mb-4" alt="Boat on Calm Water" />
    </div>

    <div class="col-lg-4 mb-4 mb-lg-0">
      <img src="_images/test5.webp" class="w-100 shadow-1-strong rounded mb-4" alt="Waves at Sea" />
      <img src="_images/test6.webp" class="w-100 shadow-1-strong rounded mb-4" alt="Yosemite National Park" />
    </div>
  </div>

  <!-- Nueva fila con una imagen grande -->
  <div class="row">
    <div class="col-12">
      <img src="_images/test7.jpeg" class="w-100 shadow-1-strong rounded mb-4" alt="Imagen panorámica" />
    </div>
  </div>
</div>

<!-- Banner Secundario con Carrusel -->
<section class="position-relative">
    <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img src="_images/creel.jpg" alt="Creel" class="img-fluid w-100 zoom-in">
                <div class="banner-overlay"></div>
                <div class="carousel-caption position-absolute top-50 start-50 translate-middle text-center">
                    <h2 class="fw-bold">Descubre Creel</h2>
                    <p>El punto de partida para explorar la Sierra Tarahumara.</p>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item">
                <img src="_images/creel.jpg" alt="Paquimé" class="img-fluid w-100 zoom-in">
                <div class="banner-overlay"></div>
                <div class="carousel-caption position-absolute top-50 start-50 translate-middle text-center">
                    <h2 class="fw-bold">Explora Paquimé</h2>
                    <p>Ruinas antiguas de la gran cultura Casas Grandes.</p>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item">
                <img src="_images/creel.jpg" alt="Bocoyna" class="img-fluid w-100 zoom-in">
                <div class="banner-overlay"></div>
                <div class="carousel-caption position-absolute top-50 start-50 translate-middle text-center">
                    <h2 class="fw-bold">Maravíllate con Bocoyna</h2>
                    <p>Un pueblo con paisajes impresionantes.</p>
                </div>
            </div>
        </div>
        <!-- Controles del Carrusel -->
        <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>
</section>

<!-- Estilos CSS -->
<style>
    /* Oscurecer la imagen del banner */

</style>


    <!-- Footer -->
<footer class="py-5" style="background-color: #f0f0f0;">
    <div class="container justify-content-center d-flex mb-5" style="max-width: 20em">
        <img src="_images/logos/lchihuahua_para_ti.png" alt="Cuenta Conmigo" class="img-fluid" >
    </div>
    <div class="container">
        <div class="row">
            <!-- Logotipo izquierdo -->
            <div class="col-md-3 mb-3 text-center">
                <img src="_images/cuenta_conmigo.png" alt="Cuenta Conmigo" class="img-fluid mb-2">
            </div>
            <!-- Información -->
            <div class="col-md-3 mb-3">
                <h5>Información</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-dark text-decoration-none">Aviso de privacidad</a></li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                    <li>Rorem ipsum dolor sit amet.</li>
                </ul>
            </div>
            <!-- Contacto -->
            <div class="col-md-3 mb-3">
                <h5>Contáctanos</h5>
                <p>Secretaría de Turismo y Desarrollo de Pueblos Mágicos</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <p>Tel. (800) 000 0X X0</p>
            </div>
            <!-- Redes sociales -->
            <div class="col-md-3 mb-3 text-center">
                <h5>Contáctanos</h5>
                <a href="#" class="d-block mb-2">
                    <img src="_images/ic_baseline-facebook.svg" alt="Facebook" class="img-fluid" style="width: 40px;">
                </a>
                <a href="#">
                    <img src="_images/x_logo.svg" alt="X" class="img-fluid" style="width: 40px;">
                </a>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Slick JS -->
<script src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
