<!DOCTYPE html>
<html lang="es">
<head>
  <?php include_once("phpAssets/head.php"); ?>
  <title>Catálogo de Ubicaciones - Atlas</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    .card img {
        height: 180px; /* Tamaño fijo para las imágenes */
        object-fit: cover; /* Para que no se deformen */
    }
    #sidebar {
        width: 280px;
        overflow-y: auto;
    }
    footer {
        margin-top: auto; /* Asegura que el footer esté en la parte inferior */
    }
    .main-content {
        flex-grow: 1; /* Asegura que el contenido ocupe el espacio restante */
    }
    
    body {
    display: flex;
    flex-direction: column;
    min-height: 120vh;

    .card-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); /* Hace que las tarjetas se acomoden */
    gap: 15px; /* Espaciado entre tarjetas */
    padding: 20px;
}

.card {
    background: white;
    border-radius: 10px;
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
    padding: 15px;
    text-align: center;
    transition: transform 0.2s ease-in-out;
}

.card:hover {
    transform: scale(1.05); /* Efecto al pasar el mouse */
}

.card img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
}

.card-title {
    font-size: 18px;
    font-weight: bold;
    margin-top: 10px;
}

.card-description {
    font-size: 14px;
    color: #555;
}
}
main {
    flex-grow: 1;
    min-height: 115vh
}
  </style>
</head>
<body class="d-flex flex-column min-vh-110">
  <header>
    <?php include_once("phpAssets/header.php"); ?>
  </header>
  
  <main class="d-flex flex-grow-1" style="min-height: 100em;">
    <!-- Sidebar del mapa -->
    <div id="sidebar" class="card p-3 shadow-lg text-white" style="background-color: #494949; width: 300px; height: 100%;">
      <h2 class="text-white mt-5 mb-4">Ubicación</h2>
      <select id="locationFilter" class="form-select mb-3" style="background-color: #1F1E1E; color: #FFFFFF;">
        <option value="all">Ver todas</option>
        <option value="bocoyna">Bocoyna</option>
      </select>

      <h2 class="text-white mt-4 mb-4">Categorías</h2>
      <div class="d-flex align-items-center justify-content-between mb-2">
        <div class="d-flex align-items-center">
          <i class="fas fa-landmark me-2"></i>
          <label class="form-check-label" for="atractivos">Atractivos Turísticos</label>
        </div>
        <div class="form-check form-switch">
          <input type="checkbox" class="form-check-input" id="atractivos" checked>
        </div>
      </div>
      <div class="d-flex align-items-center justify-content-between mb-2">
        <div class="d-flex align-items-center">
          <i class="fas fa-map-marker-alt me-2"></i>
          <label class="form-check-label" for="municipios">Municipios</label>
        </div>
        <div class="form-check form-switch">
          <input type="checkbox" class="form-check-input" id="municipios" checked>
        </div>
      </div>
      <div class="d-flex align-items-center justify-content-between mb-2">
        <div class="d-flex align-items-center">
          <i class="fas fa-calendar-alt me-2"></i>
          <label class="form-check-label" for="pueblos">Atractivos naturales</label>
        </div>
        <div class="form-check form-switch">
          <input type="checkbox" class="form-check-input" id="pueblos" checked>
        </div>
      </div>

      <button onclick="showAllMarkers()" class="btn btn-success w-100 mt-5">Ver todas las locaciones</button>
    </div>

<!-- Contenedor principal de contenido -->
<div class="flex-grow-1 d-flex flex-column" style="min-height: 100%; background-image: url('_images/textura_chihuahua_es_para_ti.svg');  background-repeat: repeat; background-color: rgba(255, 255, 255, 0.5); background-blend-mode: overlay;">
    <div id="atractivosContainer" class="container flex-grow-1 d-flex flex-wrap gap-3 p-3 justify-content-center" style="max-width: 130em"></div>
    <!-- Contenedor para la paginación -->
    <div id="paginationContainer" class="d-flex justify-content-center my-3"></div>
</div>

</main>

  
  <footer class="py-5" style="background-color: #f0f0f0;">
    <div class="container justify-content-center d-flex mb-5" style="max-width: 20em">
      <img src="_images/logos/lchihuahua_para_ti.png" alt="Cuenta Conmigo" class="img-fluid">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-3 mb-3 text-center">
          <img src="_images/cuenta_conmigo.png" alt="Cuenta Conmigo" class="img-fluid mb-2">
        </div>
        <div class="col-md-3 mb-3">
          <h5>Información</h5>
          <ul class="list-unstyled">
            <li><a href="#" class="text-dark text-decoration-none">Aviso de privacidad</a></li>
            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
            <li>Rorem ipsum dolor sit amet.</li>
          </ul>
        </div>
        <div class="col-md-3 mb-3">
          <h5>Contáctanos</h5>
          <p>Secretaría de Turismo y Desarrollo de Pueblos Mágicos</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          <p>Tel. (800) 000 0X X0</p>
        </div>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>


</html>