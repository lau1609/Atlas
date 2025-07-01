<?php

//error_reporting(E_ALL);
//ini_set('display_errors', 1);

include_once("Connections/connectMySql.php");


// Traer las categorías de atractivos
$queryTipos = "SELECT * FROM type_atrac_tb";
$resultTipos = $connectMySql->query($queryTipos);

// Traer los municipios
$queryMunicipios = "SELECT muni_id, muni_name FROM municipios_tb ORDER BY muni_name";
$resultMunicipios = $connectMySql->query($queryMunicipios);


?>

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
  <div id="sidebar" class="p-3 shadow-lg text-white sidebar transition-sidebar">
    <!-- Filtro de Regiones -->
    <h2 class="text-white mt-5 mb-4">Región Turística</h2>
    <select id="regionFilter" class="form-select mb-3" style="cursor: pointer; background-color: #1F1E1E; color: #FFFFFF;">
      <option value="all">Todas las regiones</option>
      <?php
        include_once("Connections/connectMySql.php");
        $resultRegiones = $connectMySql->query("SELECT reg_id, reg_name FROM regiones_tb ORDER BY reg_name ASC");
        while ($row = $resultRegiones->fetch_assoc()) {
            echo "<option value='{$row['reg_id']}'>{$row['reg_name']}</option>";
        }
      ?>
    </select>  
<!-- Filtro de Municipios -->
  <h2 class="text-white mt-5 mb-4">Municipio</h2>
  <select id="locationFilter"  class="form-select mb-3" style="cursor: pointer; background-color: #1F1E1E; color: #FFFFFF;">
    <option value="all">Todos los municipios</option>
      <?php
        include_once("Connections/connectMySql.php");
        $resultMunis = $connectMySql->query("SELECT muni_id, muni_name FROM municipios_tb ORDER BY muni_name ASC");
        while ($row = $resultMunis->fetch_assoc()) {
            echo "<option value='{$row['muni_id']}'>{$row['muni_name']}</option>";
        }
      ?>
  </select>
<!-- Filtro tipo de Atractivo -->
  <h2 class="text-white mt-5 mb-4">Categorías</h2>
  <?php while ($tipo = $resultTipos->fetch_assoc()): ?>
    <div class="d-flex align-items-center justify-content-between mb-2" style="cursor: pointer;">
      <div class="d-flex align-items-center">
        <i class="fas fa-map-pin me-2"></i>
        <label class="form-check-label" for="tipo_<?php echo $tipo['id_typ_atrac']; ?>"><?php echo $tipo['name_typ_atrac']; ?></label>
      </div>
      <div class="form-check form-switch">
        <input type="checkbox" class="form-check-input" id="tipo_<?php echo $tipo['id_typ_atrac']; ?>" checked>
      </div>  
    </div>
  <?php endwhile; ?>

     <!-- Boton ocultar filtros -->
<button id="toggleSidebar" class="toggle-sidebar-btn">
  <p class="toggle-btn-text"> Filtros </p>
  <img src="_images/SVG/filter_icono.svg" alt="Filtrar" width="20">
</button>

 <!-- Boton Borrar filtros -->
  <button id="resetFilters" class="btn btn-outline-light w-100 mt-2">Borrar filtros</button>



</div>



  <!-- Contenedor del mapa -->
  <div id="mapContainer" class="flex-grow-1 fade-in position-relative transition-map">
      <div id="noResults" class="text-center fw-bold text-danger display-4 mt-4 fade-in" style="display: none;">
  No se encontraron resultados.
  </div>
     <div id="map" style="height: 100%; width: 100%;"></div>
  </div>

      <!-- Guía de colores -->
  <div id="regionColorGuide">
  <h6 class="text-black fw-bold mb-3">Colores por Región</h6>
  <ul class="list-unstyled mb-0">
    <li><span data-color="rgb(227, 6, 19)"></span> Arqueológica</li>
    <li><span data-color="rgb(92, 120, 18)"></span> Barrancas del Cobre</li>
    <li><span data-color="rgb(149, 193, 31)"></span> Chihuahua</li>
    <li><span data-color="rgb(250, 184, 0)"></span> Desierto Chihuahuense</li>
    <li><span data-color="rgb(230, 0, 126)"></span> Juárez</li>
    <li><span data-color="rgb(0, 159, 227)"></span> Perlas del Conchos</li>
    <li><span data-color="rgb(112, 34, 131)"></span> Ruta de Villa</li>
  </ul>
</div>


</main>

  <footer>
    <?php include_once("phpAssets/footer.php"); ?>
  </footer>

  <!-- jQuery, Bootstrap, etc. -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
  const municipios = <?php
    $allMunis = [];
    $resultAll = $connectMySql->query("SELECT muni_id, muni_name, muni_reg_id FROM municipios_tb");
    while ($row = $resultAll->fetch_assoc()) {
        $allMunis[] = $row;
    }
    echo json_encode($allMunis);
  ?>;
</script>

<script>
  document.querySelectorAll("#regionColorGuide ul li span").forEach(el => {
    const color = el.getAttribute("data-color");
    const svg = `
      <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='${color}'>
        <path d='M12 2C8.1 2 5 5.1 5 9c0 5.3 7 13 7 13s7-7.7 7-13c0-3.9-3.1-7-7-7zm0 9.5c-1.4 0-2.5-1.1-2.5-2.5S10.6 6.5 12 6.5s2.5 1.1 2.5 2.5S13.4 11.5 12 11.5z'/>
      </svg>
    `.trim();
    const encoded = 'data:image/svg+xml;base64,' + btoa(svg);
    el.style.backgroundImage = `url(${encoded})`;
  });


</script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const sidebar = document.getElementById("sidebar");
    const toggleBtn = document.getElementById("toggleSidebar");

    // 👉 Detectar si ya estamos en versión móvil al cargar
    if (window.innerWidth < 768) {
      sidebar.classList.add("collapsed");
      document.body.classList.add("sidebar-collapsed");
    }

    // 👉 Detectar cambios de tamaño (opcional, para hacerlo más dinámico)
    window.addEventListener("resize", () => {
      if (window.innerWidth < 768) {
        sidebar.classList.add("collapsed");
        document.body.classList.add("sidebar-collapsed");
      } else {
        sidebar.classList.remove("collapsed");
        document.body.classList.remove("sidebar-collapsed");
      }
    });

    // 👉 Función del botón
    toggleBtn.addEventListener("click", () => {
      sidebar.classList.toggle("collapsed");
      document.body.classList.toggle("sidebar-collapsed");
    });
  });
</script>


<script>
document.addEventListener("DOMContentLoaded", function () {
  const sidebar = document.getElementById("sidebar");
  const toggleBtn = document.getElementById("toggleSidebar");

  function collapseSidebar() {
    sidebar.classList.add("collapsed");
    document.body.classList.add("sidebar-collapsed");
  }

  function expandSidebar() {
    sidebar.classList.remove("collapsed");
    document.body.classList.remove("sidebar-collapsed");
  }

  if (window.innerWidth < 768) {
    collapseSidebar();
  }

  window.addEventListener("resize", () => {
    if (window.innerWidth < 768) {
      collapseSidebar();
    } else {
      expandSidebar();
    }
  });

  toggleBtn.addEventListener("click", (e) => {
    e.stopPropagation();
    if (sidebar.classList.contains("collapsed")) {
      expandSidebar();
    } else {
      collapseSidebar();
    }
  });

  document.addEventListener("click", (e) => {
    const isMobile = window.innerWidth < 768;
    const clickedInsideSidebar = sidebar.contains(e.target);
    const clickedButton = toggleBtn.contains(e.target);

    if (isMobile && !clickedInsideSidebar && !clickedButton) {
      collapseSidebar();
    }
  });
});
</script>




  <!-- Incluir Main.js al final -->
  <script src="_includes/_js/main.js"></script>

  

</body>
</html>
