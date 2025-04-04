<!DOCTYPE html>
<html lang="es">
<head>
<?php include_once("phpAssets/head.php"); ?>
</head>
<body>
<header>
<?php include_once("phpAssets/header.php"); ?>
</header>
    <!-- Sección Principal -->
    <section class="section-principal fade-in" style="height: 50em;">
        <img src="_images/catedral_inicio.jpg" alt="Fondo de sección" class="background-image">
        <div class="content" styles="border-radius: 250px;">
            <img src="_images/mapa_regiones.png" alt="Logo principal">
            <h1 class="display-4 fw-bold">Atlas de Chihuahua</h1>
        </div>
    </section>

<!-- Segunda Sección -->
<section class="container py-5 section-bg fade-in">
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
            <img src="_images/catedral2.jpg" alt="Catedral de Chihuahua" style="max-width: 18em;" class="img-fluid rounded">
            <!-- Botón debajo de la imagen -->
            <div class="mt-3">
                <a href="map.php" class="btn btn-light border shadow-sm px-4 py-2 d-inline-flex align-items-center" style="border-radius: 12px;">
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
                    <a href="atrac_cards.php" class="btn btn-success mt-4">Descubre mas atractivos</a>
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
                                        <img src="_images/basaseachi.jpg" alt="Paquimé" class="card-img-top">
                                        <div class="card-body">
                                            <h5 class="card-title">Basaseachi</h5>
                                        <div style="display: flex; align-items: center; gap: 5px;">
                                            <img src="_images/SVG/bx_map.svg" alt="Ícono de mapa" style="width: 16px; height: 16px;">
                                            <p class="card-text m-0">Ocampo</p>
                                        </div>
                                        <p class="card-text m-0">La segunda cascada más grande del país.</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 d-none d-md-block">
                                    <div class="card rounded-lg" style="background-color: #F4E8D9;">
                                        <img src="_images/peguis.jpg" alt="Bocoyna" class="card-img-top">
                                        <div class="card-body">
                                            <h5 class="card-title">Cañon de peguis</h5>
                                            <div style="display: flex; align-items: center; gap: 5px;">
                                            <img src="_images/SVG/bx_map.svg" alt="Ícono de mapa" style="width: 16px; height: 16px;">
                                            <p class="card-text m-0">Ojiinaga</p>
                                        </div>
                                            <p class="card-text">Paisajes naturales únicos en el corazón de Chihuahua.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 d-none d-md-block">
                                    <div class="card rounded-lg" style="background-color: #F4E8D9;">
                                        <img src="_images/lago_de_garzas.jpg" alt="Arareko" class="card-img-top">
                                        <div class="card-body">
                                            <h5 class="card-title">Lago de las Garzas</h5>
                                        <div style="display: flex; align-items: center; gap: 5px;">
                                            <img src="_images/SVG/bx_map.svg" alt="Ícono de mapa" style="width: 16px; height: 16px;">
                                            <p class="card-text m-0">Guachochi</p>
                                        </div>
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
                                        <img src="_images/paquime2.jpg" alt="Arareko 2" class="card-img-top">
                                        <div class="card-body">
                                            <h5 class="card-title">Paquimé</h5>
                                            <div style="display: flex; align-items: center; gap: 5px;">
                                            <img src="_images/SVG/bx_map.svg" alt="Ícono de mapa" style="width: 16px; height: 16px;">
                                            <p class="card-text m-0">Casas Grandes</p>
                                        </div>
                                            <p class="card-text">Otro rincón increíble para explorar.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 d-none d-md-block">
                                    <div class="card rounded-lg" style="background-color: #F4E8D9;">
                                        <img src="_images/villa.jpg" alt="Paquimé 2" class="card-img-top">
                                        <div class="card-body">
                                            <h5 class="card-title">Estatua de Villa</h5>

                                            <div style="display: flex; align-items: center; gap: 5px;">
                                            <img src="_images/SVG/bx_map.svg" alt="Ícono de mapa" style="width: 16px; height: 16px;">
                                            <p class="card-text m-0">Casas Grandes</p>
                                        </div>
                                            
                                            <p class="card-text">Un sitio arqueológico impresionante.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 d-none d-md-block">
                                    <div class="card rounded-lg" style="background-color: #F4E8D9;">
                                        <img src="_images/Quinta.jpg" alt="Bocoyna 2" class="card-img-top">
                                        <div class="card-body">
                                            <h5 class="card-title">Quinta Gameros</h5>
                                            <div style="display: flex; align-items: center; gap: 5px;">
                                            <img src="_images/SVG/bx_map.svg" alt="Ícono de mapa" style="width: 16px; height: 16px;">
                                            <p class="card-text m-0">Chihuahua</p>
                                        </div>
                                            
                                            <p class="card-text">Uno de los edificios más bellos de Chihuahua.</p>
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




<!-- Banner Secundario con Carrusel -->
<section class="position-relative">
    <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <a href="regiones.php" style="text-decoration: none; color: inherit;"></a>
                    <img src="_images/creel.jpg" alt="Creel" class="img-fluid w-100 zoom-in">
                    <div class="banner-overlay"></div>
                    <div class="carousel-caption position-absolute top-50 start-50 translate-middle text-center">
                        <h2 class="fw-bold text-white display-2">Descubre Bocoyna</h2>
                        <p class="text-white mt-4">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed nisl eu lorem malesuada hendrerit et feugiat nisl. Phasellus condimentum mauris non purus tincidunt, sit amet iaculis metus mattis. Donec porta, ex at mollis pretium, justo lacus lacinia est, lacinia auctor ante mi non eros. Proin nisl odio.posuere sodales augue lacinia ac. Suspendisse mollis accumsan quam ut tristique
                        </p>
                </div>
                
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item">
                <img src="_images/creel.jpg" alt="Paquimé" class="img-fluid w-100 zoom-in">
                <div class="banner-overlay"></div>
                <div class="carousel-caption position-absolute top-50 start-50 translate-middle text-center">
                <h2 class="fw-bold text-white display-2">Descubre Bocoyna</h2>
                <p class="text-white mt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed nisl eu lorem malesuada hendrerit et feugiat nisl. Phasellus condimentum mauris non purus tincidunt, sit amet iaculis metus mattis. Donec porta, ex at mollis pretium, justo lacus lacinia est, lacinia auctor ante mi non eros. Proin nisl odio.posuere sodales augue lacinia ac. Suspendisse mollis accumsan quam ut tristique.</p>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item">
                <img src="_images/creel.jpg" alt="Bocoyna" class="img-fluid w-100 zoom-in">
                <div class="banner-overlay"></div>
                <div class="carousel-caption position-absolute top-50 start-50 translate-middle text-center">
                    <h2 class="fw-bold display-2 text-white">Descubre Bocoyna</h2>
                    <p class="text-white mt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed nisl eu lorem malesuada hendrerit et feugiat nisl. Phasellus condimentum mauris non purus tincidunt, sit amet iaculis metus mattis. Donec porta, ex at mollis pretium, justo lacus lacinia est, lacinia auctor ante mi non eros. Proin nisl odio.posuere sodales augue lacinia ac. Suspendisse mollis accumsan quam ut tristique.</p>
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




    <!-- Footer -->
<footer>

<?php include_once("phpAssets/footer.php"); ?>


</footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
