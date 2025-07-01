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
  <title>Catálogo de Ubicaciones - Atlas</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>

    footer {
        margin-top: auto; /* Asegura que el footer esté en la parte inferior */
    }

    body {
    display: flex;
    flex-direction: column;
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
  height: 350px;
  max-width: 500px;
  object-fit: cover;
  border-top-left-radius: 0.5rem;
  border-top-right-radius: 0.5rem;
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

#sidebar {
  transition: margin-left 0.400s ease;
  width: 300px;
  height: 100%;
  text-align: center;
  z-index: 3;
  background-color: #494949;
  position: absolute;
}

.toggle-sidebar-btn2 {
  position: absolute;
  top: 50%;
  left: 295px; /* se sale justo al borde del sidebar */
  transform: translateY(-50%);
  z-index: 20;
  background-color: #494949;
  border: none;
  width: 42px;
  height: 150px;
  border-top-right-radius: 10px;
  border-bottom-right-radius: 10px;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
  transition: left 0.4s ease;
  display: flex;
  align-items: center;
  flex-direction: column;


}

.toggle-sidebar-btn2 p {
  color: white;
  writing-mode: vertical-rl;
  white-space: nowrap;
 }

 .toggle-sidebar-btn2 {
  left: 295px;
  transition: left 0.400s ease; 
}

/* Responsivo en móvil */
@media (max-width: 768px) {
  #sidebar {
  transition: margin-left 0.400s ease;
  width: 250px;
  height: 100%;
  text-align: center;
  background-color: #494949;
  position: absolute;
}

.toggle-sidebar-btn2 {
  left: 245px;
  transition: left 0.400s ease; 
}

  .toggle-sidebar-btn2 {
    /*left: 0 !important;*/
    top: 300px;
    transform: none;
    z-index: 1001;
    left: 245px;
  }

  .cont_cards{
 margin-left: 0% !important;

}

.card img {
  height: 150px;
  max-width: 500px;
  object-fit: cover;
  border-top-left-radius: 0.5rem;
  border-top-right-radius: 0.5rem;
}

#atractivosContainer {
    max-height: 80vh; /* Ajusta según lo que quieras mostrar */
    overflow-y: auto;
    padding-left: 1rem;
    padding-right: 1rem;
    margin-left: 0 !important; /* Corrige el desmadre del margen */
}

}

.cont_cards{
 margin-left: 10%;

}




  </style>
</head>
<body>
  <header>
    <?php include_once("phpAssets/header.php"); ?>
  </header>
  
  <main class="d-flex fade-in" style="height: auto;">
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
<button id="toggleSidebar" class="toggle-sidebar-btn2">
  <p class="toggle-btn-text"> Filtros </p>
  <img src="_images/SVG/filter_icono.svg" alt="Filtrar" width="20">
</button>

 <!-- Boton Borrar filtros -->
  <button id="resetFilters" class="btn btn-outline-light w-100 mt-2">Borrar filtros</button>



</div>


  <!-- Contenedor de resultados -->
  <div class="flex-grow-1 d-flex fade-in flex-column container-fluid" style="min-height: 100%; background-image: url('_images/textura_chihuahua_es_para_ti.svg');  background-repeat: repeat; background-color: rgba(255, 255, 255, 0.85); background-blend-mode: overlay;">
    <div id="noResults" class="text-center fw-bold text-danger display-4 mt-4 fade-in" style="display: none;">
      No se encontraron resultados.
    </div>
    <div id="atractivosContainer" class="row container flex-grow-1 d-flex flex-wrap gap-1 p-3 justify-content-center cont_cards" style="max-width: 130em;"></div>
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

  <!-- Primero carga Bootstrap bien -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Luego defines el array de municipios -->
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
  document.addEventListener("DOMContentLoaded", function () {
    const sidebar = document.getElementById("sidebar");
    const toggleBtn = document.querySelector(".toggle-sidebar-btn2");

    // Detectar si ya estamos en versión móvil al cargar
    if (window.innerWidth < 768) {
      sidebar.classList.add("collapsed");
      document.body.classList.add("sidebar-collapsed");
    }

    // Detectar cambios de tamaño (opcional, para hacerlo más dinámico)
    window.addEventListener("resize", () => {
      if (window.innerWidth < 768) {
        sidebar.classList.add("collapsed");
        document.body.classList.add("sidebar-collapsed");
      } else {
        sidebar.classList.remove("collapsed");
        document.body.classList.remove("sidebar-collapsed");
      }
    });

    // Función del botón
    toggleBtn.addEventListener("click", () => {
      sidebar.classList.toggle("collapsed");
      document.body.classList.toggle("sidebar-collapsed");
    });
  });
</script>

  <script>
document.addEventListener("DOMContentLoaded", function () {
  const sidebar = document.getElementById("sidebar");
  const toggleBtn = document.querySelector(".toggle-sidebar-btn2");

  // Función para colapsar el sidebar
  function collapseSidebar() {
    sidebar.classList.add("collapsed");
    document.body.classList.add("sidebar-collapsed");
  }

  // Función para expandir el sidebar
  function expandSidebar() {
    sidebar.classList.remove("collapsed");
    document.body.classList.remove("sidebar-collapsed");
  }

  // Al cargar, si es móvil, colapsar
  if (window.innerWidth < 768) {
    collapseSidebar();
  }

  //  Evento de resize (por si se cambia el tamaño manualmente)
  window.addEventListener("resize", () => {
    if (window.innerWidth < 768) {
      collapseSidebar();
    } else {
      expandSidebar();
    }
  });

  // Toggle al presionar el botón
  toggleBtn.addEventListener("click", (e) => {
    e.stopPropagation(); // evitar conflicto con document click

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

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const sidebar = document.getElementById("sidebar");
    const toggleBtn = document.getElementById("toggleSidebar2");

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





</body>


</html>