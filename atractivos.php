<?php
include_once("Connections/connectMySql.php");

$atrac_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Consulta principal
$query = "
SELECT 
    a.atrac_id,
    a.atrac_name,
    a.atrac_reg_id,
    a.atrac_cover_text,
    a.atrac_desc,
    a.atrac_horario,
    a.atrac_direcc,
    a.atrac_tel,
    a.atrac_price,
    a.atrac_soc_face,
    a.atrac_soc_inst,
    a.atrac_latitud,
    a.atrac_longitud,
    a.atrac_muni_id, 
    m.muni_name,
    r.reg_name,
    g.gal_url,
    icono.gal_url AS icono_region_url
FROM atractivos_tb a
JOIN municipios_tb m ON a.atrac_muni_id = m.muni_id
JOIN regiones_tb r ON a.atrac_reg_id = r.reg_id
JOIN gallery_tb g ON a.atrac_id = g.gal_dif AND g.gal_type = 3
LEFT JOIN gallery_tb icono ON icono.gal_dif = a.atrac_reg_id AND icono.gal_type = 5
WHERE a.atrac_id = $atrac_id
LIMIT 1
";

$result = $connectMySql->query($query);
$atractivo = $result->fetch_assoc(); 

$muni_id = $atractivo['atrac_muni_id'];

// Consulta de atractivos relacionados
$queryRelacionados = "
SELECT 
    a.atrac_id,
    a.atrac_name,
    m.muni_name,
    g.gal_url
FROM atractivos_tb a
JOIN municipios_tb m ON a.atrac_muni_id = m.muni_id
JOIN gallery_tb g ON a.atrac_id = g.gal_dif AND g.gal_type = 3
WHERE a.atrac_muni_id = $muni_id AND a.atrac_id != $atrac_id
";

$resultRelacionados = $connectMySql->query($queryRelacionados);

$coloresPorRegion = [
  1 => 'rgb(227, 6, 19)',
  2 => 'rgb(92, 120, 18)',
  3 => 'rgb(149, 193, 31)',
  4 => 'rgb(227, 6, 19)',
  5 => 'rgb(230, 0, 126)',
  6 => 'rgb(0, 159, 227)',
  7 => 'rgb(112, 34, 131)'
];

$colorFondo = $coloresPorRegion[$atractivo['atrac_reg_id']] ?? '#5C7812'; // Color por defecto si no hace match
?>


<!DOCTYPE html>
<html lang="es">
<head>
<link rel="stylesheet" href="_includes/_css/styles.css">
<?php include_once("phpAssets/head.php"); ?>
</head>
<body>
<header>
<?php include_once("phpAssets/header.php"); ?>
<style>
.fancy-bg {
  position: relative;
  background-color: #5C7812;
  padding: 50px 0;
  overflow: hidden; /* importante para que no se salga el fondo */
}

.fancy-bg::before {
  content: "";
  position: absolute;
  top: 0; left: 0;
  width: 100%;
  height: 100%;
  background-image: url('_images/textura_chihuahua_es_para_ti.svg');
  background-repeat: repeat;
  background-size: auto;
  opacity: 0.2; /* aquí controlas qué tan tenue se ve */
  z-index: 0;
}

.fancy-bg > * {
  position: relative;
  z-index: 1;
}


  .slick-prev:before,
  .slick-next:before {
    color: black;
    font-size: 30px;
  }

  .card-image-fixed {
  width: 100%;
  height: 220px;
  object-fit: cover;
}

.btn-ver-mas {
    background-color: #5C7812;
    color: white;
    border: none;
    transition: all 0.3s ease-in-out;
    padding: 8px 12px;
    border-radius: 5px;
    text-decoration: none;
    display: inline-block;
}

.btn-ver-mas:hover {
    background-color: #3F560D;
    transform: scale(1.1);
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
}

.imgfix img {
  height: 470px;
  object-fit: cover;
}



</style>


</header>

<!-- Banner Dinámico -->
<section class="position-relative">
    <div class="carousel-inner">
        <div>
            <img src="<?php echo $atractivo['gal_url']; ?>" alt="<?php echo $atractivo['atrac_name']; ?>" class="img-fluid w-100 zoom-in banner-img banner-img-zoom"
            style=" object-fit: cover;">>
            <div class="banner-overlay"></div>

                <div class="banner-content d-flex flex-column align-items-center justify-content-center position-absolute top-50 start-50 translate-middle text-center p-3" style="z-index: 2;">
                    <!-- Icono -->
                    <div class="banner-icon mt-3 mb-3 d-flex align-items-center justify-content-center rounded-circle" style="width: 100px; height: 100px; background-color: rgba(0,0,0,0.5);">
                      <img src="<?php echo $atractivo['icono_region_url']; ?>" alt="Icono de región" class="img-fluid" style="max-width: 60%; max-height: 60%;">
                    </div>

                    <!-- Región -->
                    <p class="text-white fs-6 fw-semibold"><?php echo $atractivo['reg_name']; ?></p>

                    <!-- Título -->
                    <h2 class="fw-bold text-white display-2"><?php echo $atractivo['atrac_name']; ?></h2>

                    <!-- Municipio -->
                    <p class="text-white fs-6">Municipio:
                      <a href="municipios.php?id=<?php echo $atractivo['atrac_muni_id']; ?>" class="text-white text-decoration-underline fw-bold">
                        <?php echo $atractivo['muni_name']; ?>
                      </a>
                    </p>

                    <!-- Descripción corta -->
                    <p class="h6 text-white mt-3 mb-4">
                        <?php echo $atractivo['atrac_cover_text']; ?>
                    </p>
                </div>

        </div>
    </div>
</section>



<!-- Descripcion -->
<section class="carrusel-atrac fancy-bg" style="background-color: <?php echo $colorFondo; ?>;">
<h2 class="text-white text-center mb-4 fw-bold text-decoration-underline">Descripción</h2>
<div class="container text-white col-md-12 mt">
    <p><?php echo $atractivo['atrac_desc']; ?></p>
</div>

<!-- Carrusel de galeria -->
<div class="container my-5">
  <div class="row align-items-center">

  <?php
include_once("Connections/connectMySql.php");
$atrac_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$galeriaQuery = "SELECT gal_url FROM gallery_tb WHERE gal_dif = $atrac_id AND gal_type = 2";
$galeriaResult = $connectMySql->query($galeriaQuery);

$imagenes = [];
while ($row = $galeriaResult->fetch_assoc()) {
    $rutas = explode('***', $row['gal_url']);
    foreach ($rutas as $ruta) {
        if (!empty(trim($ruta))) {
            $imagenes[] = trim($ruta);
        }
    }
}
?>

<div class="col-md-6">
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">

    <!-- Indicadores -->
    <div class="carousel-indicators">
      <?php foreach ($imagenes as $index => $_): ?>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $index ?>"
                <?= $index === 0 ? 'class="active" aria-current="true"' : '' ?> aria-label="Slide <?= $index + 1 ?>"></button>
      <?php endforeach; ?>
    </div>

    <!-- Carrusel dinámico -->
    <div class="carousel-inner imgfix">
      <?php foreach ($imagenes as $index => $url): ?>
        <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
          <img src="<?= $url ?>" class="d-block w-100 rounded" alt="Imagen <?= $index + 1 ?>">
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Controles -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Siguiente</span>
    </button>
  </div>
</div>


    <!-- Datos del atractivo y Botón -->

<div class="col-md-6 text-white p-4 rounded description-box" style="background-color: rgba(0, 0, 0, 0.28);">
    <p class="fw-bold mt-2">Horario:</p>
    <p><?php echo $atractivo['atrac_horario']; ?></p>
    <p class="fw-bold mt-2">Dirección:</p>
    <p><?php echo $atractivo['atrac_direcc']; ?></p>
    <p class="fw-bold mt-2">Teléfono:</p>
    <p><?php echo $atractivo['atrac_tel']; ?></p>
    <p class="fw-bold mt-2">Precio de entrada:</p>
    <p>$ <?php echo $atractivo['atrac_price']; ?> MXN</p>

    <!-- Redes -->
    <a href="<?php echo $atractivo['atrac_soc_face']; ?>" target="_blank">
        <img src="_images/logos/facebook.png" alt="Facebook" class="img-fluid" style="width: 40px;">
    </a>
    <a href="<?php echo $atractivo['atrac_soc_inst']; ?>" target="_blank">
        <img src="_images/logos/instagram.png" alt="Instagram" class="img-fluid" style="width: 40px;">
    </a>

    <br>
    <!-- Botón ubicación -->
    <a href="https://www.google.com/maps?q=<?php echo $atractivo['atrac_latitud']; ?>,<?php echo $atractivo['atrac_longitud']; ?>" target="_blank" class="btn btn-success mt-4">¿Cómo llegar?</a>
</div>




    <!-- CONTENEDOR -->
<div class="container mt-5 " style="max-width:1500px;">
  <h2 class="text-white text-center mb-4 fw-bold">Más atractivos turísticos</h2>

  <!-- CARRUSEL -->
  <<div id="carouselAtractivos" class="slick-carousel mt-5">
<?php while ($rel = $resultRelacionados->fetch_assoc()): ?>
  <div class="card h-100">
    <img src="<?php echo $rel['gal_url']; ?>" class="card-img-top card-image-fixed" alt="<?php echo $rel['atrac_name']; ?>">
    <div class="card-body bg-success text-white text-center">
      <p><i class="bi bi-geo-alt"></i> <?php echo $rel['muni_name']; ?></p>
      <h5 class="fw-bold"><?php echo $rel['atrac_name']; ?></h5>
      <a href="atractivos.php?id=<?php echo $rel['atrac_id']; ?>" class="btn-ver-mas mt-2 btn-sm">Ver más</a>
    </div>
  </div>
<?php endwhile; ?>
</div>
</div>

</section>


    <!-- Footer -->
    <footer class="py-5" style="background-color: #F0F0F0;">

<?php include_once("phpAssets/footer.php"); ?>


</footer>
<script>
$(document).ready(function(){
    $('#carouselAtractivos').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: true,
        dots: false,
        responsive: [
            {
                breakpoint: 768,
                settings: { slidesToShow: 2 }
            },
            {
                breakpoint: 480,
                settings: { slidesToShow: 1 }
            }
        ]
    });
});
</script>
</body>
</html>