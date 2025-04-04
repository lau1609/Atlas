<!DOCTYPE html>
<html lang="es">
<head>
  <?php include_once("phpAssets/head.php"); ?>
  <title>Mapa Interactivo - Atlas</title>

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

</head>
<body>
  <header>
    <?php include_once("phpAssets/header.php"); ?>
  </header>

  <!-- Sidebar del mapa -->
  <main class="d-flex">
    <!-- Sidebar -->
    <div id="sidebar" class="card p-3 shadow-lg text-white" style="background-color: #494949; width: 300px; height: 100vh;">
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



    <!-- Contenedor del mapa -->
    <div id="mapContainer" class="flex-grow-1 fade-in">
        <div id="map" style="height: 100vh; width: 100%;"></div>
    </div>
</main>


 <!-- mapa -->
 <div style="height: 50px; width: 100%;"></div>

  </main>

  <footer class="py-5">
    <?php include_once("phpAssets/footer.php"); ?>
  </footer>

  <!-- jQuery, Bootstrap, etc. -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Incluir Main.js al final -->
  <script src="_includes/_js/main.js"></script>

</body>
</html>
