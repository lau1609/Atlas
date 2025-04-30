<?php
include_once("Connections/connectMySql.php");

$atrac_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$query = "
SELECT 
    a.atrac_name,
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
    m.muni_name,
    r.reg_name,
    g.gal_url
FROM atractivos_tb a
JOIN municipios_tb m ON a.atrac_muni_id = m.muni_id
JOIN regiones_tb r ON a.atrac_reg_id = r.reg_id
JOIN gallery_tb g ON a.atrac_id = g.gal_dif AND g.gal_type = 3
WHERE a.atrac_id = $atrac_id
LIMIT 1
";

$result = $connectMySql->query($query);
$atractivo = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
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

</style>


</header>

<!-- Banner Dinámico -->
<section class="position-relative">
    <div class="carousel-inner">
        <div>
            <img src="<?php echo $atractivo['gal_url']; ?>" alt="<?php echo $atractivo['atrac_name']; ?>" class="img-fluid w-100 zoom-in">
            <div class="banner-overlay"></div>

            <div class="d-flex flex-column align-items-center justify-content-center position-absolute top-50 start-50 translate-middle text-center p-3" style="z-index: 2;">
                <!-- Icono -->
                <div class="mt-3 mb-3" style="width: 100px; height: 100px; background-color: rgba(0,0,0,0.5); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                    <img src="_images/SVG/icono_barrancas.png" alt="Logotipo" class="img-fluid" style="max-width: 60%; max-height: 60%;">
                </div>

                <!-- Región -->
                <p class="text-white fs-6 fw-semibold"><?php echo $atractivo['reg_name']; ?></p>

                <!-- Título -->
                <h2 class="fw-bold text-white display-2"><?php echo $atractivo['atrac_name']; ?></h2>

                <!-- Municipio -->
                <p class="text-white fs-6">Municipio: <?php echo $atractivo['muni_name']; ?></p>

                <!-- Descripción corta -->
                <p class="text-white mt-3 mb-4 fs-5">
                    <?php echo $atractivo['atrac_cover_text']; ?>
                </p>
            </div>
        </div>
    </div>
</section>



<!-- Descripcion -->
<section class="carrusel-atrac fancy-bg">
<div class="container text-white col-md-12 mt">
    <p><?php echo $atractivo['atrac_desc']; ?></p>
</div>


<div class="container my-5">
  <div class="row align-items-center">

    <!-- Galería con Carousel de Bootstrap -->
    <?php
include_once("Connections/connectMySql.php");
$atrac_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$galeriaQuery = "SELECT gal_url FROM gallery_tb WHERE gal_dif = $atrac_id AND gal_type = 2";
$galeriaResult = $connectMySql->query($galeriaQuery);

$imagenes = [];
while ($row = $galeriaResult->fetch_assoc()) {
    $imagenes[] = $row['gal_url'];
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
    <div class="carousel-inner">
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

    <!-- Descripción y Botón -->

<div class="col-md-6 text-white p-4 rounded description-box" style="background-color: rgba(0, 0, 0, 0.28);">
    <p class="fw-bold mt-2">Horario:</p>
    <p><?php echo $atractivo['atrac_horario']; ?></p>
    <p class="fw-bold mt-2">Dirección:</p>
    <p><?php echo $atractivo['atrac_direcc']; ?></p>
    <p class="fw-bold mt-2">Teléfono:</p>
    <p><?php echo $atractivo['atrac_tel']; ?></p>
    <p class="fw-bold mt-2">Precio de entrada:</p>
    <p><?php echo $atractivo['atrac_price']; ?></p>

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
  <div id="carouselAtractivos" class="slick-carousel mt-5">

    <!-- TARJETA 1 -->
    <div class="card h-100">
      <img src="_images/cascada_riukaso.png" class="card-img-top card-image-fixed" alt="Cascada de Rukiraso">
      <div class="card-body bg-success text-white text-center">
        <p><i class="bi bi-geo-alt"></i> Bocoyna</p>
        <h5 class="fw-bold">Cascada de Rukiraso</h5>
        <a href="#" class="btn-ver-mas mt-2 btn-sm">Ver más</a>
      </div>
    </div>

    <!-- TARJETA 2 -->
    <div class="card h-100">
      <img src="_images/lago_arareko.png" class="card-img-top card-image-fixed" alt="Lago Arareko">
      <div class="card-body bg-success text-white text-center">
        <p><i class="bi bi-geo-alt"></i> Bocoyna</p>
        <h5 class="fw-bold">Lago Arareko</h5>
        <a href="#" class="btn-ver-mas mt-2 btn-sm">Ver más</a>
      </div>
    </div>

    <!-- TARJETA 3 -->
    <div class="card h-100">
      <img src="_images/valle_hongos.png" class="card-img-top card-image-fixed" alt="Valle de los Hongos">
      <div class="card-body bg-success text-white text-center">
        <p><i class="bi bi-geo-alt"></i> Bocoyna</p>
        <h5 class="fw-bold">Valle de los Hongos</h5>
        <a href="#" class="btn-ver-mas mt-2 btn-sm">Ver más</a>
      </div>
    </div>

    <!-- TARJETA 4 -->
    <div class="card h-100">
      <img src="_images/mision_sanignacio.jpeg" class="card-img-top card-image-fixed" alt="Misión San Ignacio">
      <div class="card-body bg-success text-white text-center">
        <p><i class="bi bi-geo-alt"></i> Bocoyna</p>
        <h5 class="fw-bold">Misión San Ignacio</h5>
        <a href="#" class="btn-ver-mas mt-2 btn-sm">Ver más</a>
      </div>
    </div>

  </div>
</div>

</section>


    <!-- Footer -->
    <footer class="py-5" style="background-color: #F0F0F0;">

<?php include_once("phpAssets/footer.php"); ?>


</footer>
</body>
</html>