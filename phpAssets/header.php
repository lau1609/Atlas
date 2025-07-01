<header class="header-chihuahua sticky-top">
  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container-fluid py-2 px-4">
      <a class="navbar-brand logo-header-ch" href="index.php">
        <img 
          src="_images/logos/lchihuahua_para_ti.png" 
          alt="Logo Chihuahua para ti" 
          class="d-block img-logo-header"
        >
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto fs-6 fw-bolder gap-3">
          <li class="nav-item">
            <a class="nav-link nav-link-ch" href="index.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-ch" href="map.php">Navegaaaaa por el mapa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-ch" href="atrac_cards.php">Atractivos turísticos</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const navbarEl = document.getElementById("navbarNav");
    const toggler = document.querySelector(".navbar-toggler");

    if (navbarEl && toggler) {
      toggler.addEventListener("click", function () {
        const bsCollapse = bootstrap.Collapse.getOrCreateInstance(navbarEl);

        if (navbarEl.classList.contains("show")) {
          bsCollapse.hide();
        } else {
          bsCollapse.show();
        }
      });
    }
  });
</script>
