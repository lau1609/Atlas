<!DOCTYPE html>
<html lang="es">
<head>
<?php include_once("phpAssets/head.php"); ?>
</head>
<body>
<header>
<?php include_once("phpAssets/header.php"); ?>
<style>
    .overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 77, 173, 0.5); /* Ajusta el color y la opacidad aquí */
    z-index: 1; /* Para que quede encima del video */
}
.background-video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: 0;
}
.logo-container {
            height: 150px;
            display: flex;
            justify-content: space-around;
            align-items: center;
            background-color: #f8f9fa;
        }
        .logo {
            width: 130px;
            transition: transform 0.3s ease;
        }
        .logo:hover {
            transform: scale(1.1);
        }
.img-fixed {
    width: 70px; /* Ancho fijo */
    height: 350px; /* Alto fijo */
    object-fit: cover; /* Mantiene la proporción sin deformar */
    display: block; /* Asegura un buen comportamiento en el layout */
    margin: 0 auto; /* Opcional: Centra la imagen */
}

</style>
</header>
    <!-- Sección Principal -->
<section class="section-principal fade-in position-relative" style="height: 50em; overflow: hidden;">
    <!-- Video de fondo -->
    <video autoplay muted loop class="background-video" style="position: absolute; width: 100%; height: 100%; object-fit: cover;">
        <source src="_images/_video/portada_puerta.mp4" type="video/mp4">
        Tu navegador no soporta videos HTML5.
    </video>

    <!-- Filtro azul -->
    <div class="overlay" style="position: absolute; width: 100%; height: 100%; background-color: rgba(0, 77, 173, 0.4);"></div>

    <!-- Contenido centrado -->
    <div class="content position-absolute top-50 start-50 translate-middle text-center" style="z-index: 2;">
        <img src="_images/mapa_regiones.png" alt="Logo principal" style="width: 150px; height: auto;">
        <h1 class="display-1 fw-bold text-white">Atlas de Chihuahua</h1>
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
        <sectio class="row">
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
<?php
include_once("Connections/connectMySql.php");

// Consulta para obtener los atractivos naturales
$query = "SELECT 
    atractivos_tb.atrac_name,  
    municipios_tb.muni_name,
    atractivos_tb.atrac_cover_text,
    gallery_tb.gal_url
FROM 
    atractivos_tb
JOIN 
    gallery_tb ON atractivos_tb.atrac_id = gallery_tb.gal_dif
JOIN 
    municipios_tb ON atractivos_tb.atrac_muni_id = municipios_tb.muni_id
WHERE 
    gallery_tb.gal_type = 2;"; // Ajusta el tipo de galería según lo que necesites

$result = $connectMySql->query($query);
?>

<div class="col-md-9">
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            $counter = 0; // Contador para agrupar las tarjetas
            while ($row = $result->fetch_assoc()) {
                if ($counter % 3 == 0) {
                    // Abre un nuevo grupo de tarjetas cada 3
                    echo '<div class="carousel-item ' . ($counter === 0 ? 'active' : '') . '">';
                    echo '<div class="row">';
                }
            ?>
                    <div class="col-md-4">
                        <div class="card rounded-lg" style="background-color: #F4E8D9;">
                            <img src="<?php echo $row['gal_url']; ?>" alt="<?php echo $row['atrac_name']; ?>" class="card-img-top img-fixed">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['atrac_name']; ?></h5>
                                <div style="display: flex; align-items: center; gap: 5px;">
                                    <img src="_images/SVG/bx_map.svg" alt="Ícono de mapa" style="width: 16px; height: 16px;">
                                    <p class="card-text m-0"><?php echo $row['muni_name']; ?></p>
                                </div>
                                <p class="card-text m-0"><?php echo $row['atrac_cover_text']; ?></p>
                            </div>
                        </div>
                    </div>
            <?php
                $counter++;
                if ($counter % 3 == 0) {
                    // Cierra el grupo de tarjetas después de cada 3
                    echo '</div></div>';
                }
            }
            if ($counter % 3 != 0) {
                // Cierra el grupo si el número total no es múltiplo de 3
                echo '</div></div>';
            }
            ?>
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

<section>
    <div class="logo-container">
        <a href="#"><img src="_images\logos\rnt.svg" alt="Logotipo 1" class="logo"></a>
        <a href="#"><img src="_images\logos\sichiturLogo.png" alt="Logotipo 2" class="logo"></a>
        <a href="#"><img src="_images/logos/lchihuahua_para_ti.png" alt="Logotipo 3" class="logo"></a>
        <a href="#"><img src="_images/logos/lchihuahua_para_ti.png" alt="Logotipo 4" class="logo"></a>
        <a href="#"><img src="_images/logos/lchihuahua_para_ti.png" alt="Logotipo 5" class="logo"></a>
    </div>
</section>


    <!-- Footer -->
<footer>

<?php include_once("phpAssets/footer.php"); ?>


</footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
