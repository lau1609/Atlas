<?php
include_once("Connections/connectMySql.php");

$muni_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Consulta para traer los datos del municipio, región y el ícono de región
$query = "
SELECT 
    m.muni_id,
    m.muni_name,
    m.muni_reg_id,
    m.muni_desc,
    m.muni_temp,
    m.muni_cult,
    m.muni_nat,
    m.muni_cover_text,
    r.reg_name,
    icono.gal_url AS icono_region_url
FROM municipios_tb m
JOIN regiones_tb r ON m.muni_reg_id = r.reg_id
LEFT JOIN gallery_tb icono ON icono.gal_dif = m.muni_reg_id AND icono.gal_type = 5
WHERE m.muni_id = $muni_id
LIMIT 1
";

$result = $connectMySql->query($query);
$municipio = $result->fetch_assoc();

// Seleccionar imagen aleatoria del municipio para el banner
$imgQuery = "
SELECT gal_url FROM gallery_tb g
JOIN atractivos_tb a ON g.gal_dif = a.atrac_id
WHERE a.atrac_muni_id = $muni_id AND g.gal_type = 3
ORDER BY RAND()
LIMIT 1
";

$imgResult = $connectMySql->query($imgQuery);
$imgData = $imgResult->fetch_assoc();
$bannerImage = $imgData ? $imgData['gal_url'] : '_images/default.jpg'; // fallback si no hay

$queryRelacionados = "
SELECT 
    a.atrac_id,
    a.atrac_name,
    m.muni_name,
    g.gal_url
FROM atractivos_tb a
JOIN municipios_tb m ON a.atrac_muni_id = m.muni_id
JOIN gallery_tb g ON a.atrac_id = g.gal_dif AND g.gal_type = 3
WHERE a.atrac_muni_id = $muni_id
GROUP BY a.atrac_id
";

$resultRelacionados = $connectMySql->query($queryRelacionados);

$coloresPorRegion = [
  1 => 'rgb(227, 6, 19)',
  2 => 'rgb(92, 120, 18)',
  3 => 'rgb(149, 193, 31)',
  4 => 'rgb(250, 184, 0)',
  5 => 'rgb(230, 0, 126)',
  6 => 'rgb(0, 159, 227)',
  7 => 'rgb(112, 34, 131)'
];

$colorFondo = $coloresPorRegion[$municipio['muni_reg_id']] ?? '#5C7812'; // fallback si no hace match


?>



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
</head>
<body>
<header>
<?php include_once("phpAssets/header.php"); ?>
</header>

<section class="position-relative">
  <div class="carousel-inner">
    <div>
      <img src="<?php echo $bannerImage; ?>" alt="<?php echo $municipio['muni_name']; ?>" class="img-fluid w-100 zoom-in banner-img banner-img-zoom" style="object-fit: cover;">
      <div class="banner-overlay"></div>

      <div class="banner-content d-flex flex-column align-items-center justify-content-center position-absolute top-50 start-50 translate-middle text-center p-3" style="z-index: 2; width: 100%;">
        <!-- Icono región -->
        <div class="banner-icon mt-3 mb-3 d-flex align-items-center justify-content-center rounded-circle" style="width: 100px; height: 100px; background-color: rgba(0,0,0,0.5);">
          <img src="<?php echo $municipio['icono_region_url']; ?>" alt="Icono de región" class="img-fluid" style="max-width: 60%; max-height: 60%;">
        </div>

        <!-- Nombre región -->
        <p class="text-white fs-6 fw-semibold"><?php echo $municipio['reg_name']; ?></p>

        <!-- Nombre municipio -->
        <h2 class="fw-bold text-white display-2"><?php echo $municipio['muni_name']; ?></h2>

        <!-- Descripción -->
        <p class="h6 text-white mt-3 mb-4">
          <?php echo $municipio['muni_cover_text']; ?>
        </p>
      </div>
    </div>
  </div>
</section>


<div class="container my-5 fade-in">
  <h2 class="text-center mb-4">Descubre mas sobre <?php echo $municipio['muni_name']; ?> </h2>
  <hr class="custom-hr"><br><br>
  <p class="text-center mb-5">
  <?php echo $municipio['muni_desc']; ?>
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
            <?php echo $municipio['muni_temp']; ?>
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
          <?php echo $municipio['muni_cult']; ?>
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
          <?php echo $municipio['muni_nat']; ?>
          </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="carrusel-atrac fade-in fancy-bg" style="background-color: <?php echo $colorFondo; ?>;">
  <<!-- CARRUSEL -->
  <div class="container mt-5 " style="max-width:1500px;">
    <h2 class="text-white text-center mb-4 fw-bold">Más atractivos turísticos</h2>

    <div id="carouselAtractivos" class="slick-carousel mt-5">
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