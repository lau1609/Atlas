// =======================
// MAIN.JS UNIFICADO PARA MAPA Y TARJETAS
// =======================

$(document).ready(function () {
  console.log("Documento listo");

  const coloresPorRegion = {
    1: 'red',             // rgb(227, 6, 19)
    2: '#5C7812',         // rgb(92, 120, 18)
    3: '#95C11F',         // rgb(149, 193, 31)
    4: '#FAB800',         // rgb(250, 184, 0)
    5: '#E6007E',         // rgb(230, 0, 126)
    6: '#009FE3',         // rgb(0, 159, 227)
    7: '#702283'          // rgb(112, 34, 131)
};

  setTimeout(() => {
    document.querySelector(".fade-in")?.classList.add("show");
  }, 500);

  // =======================
  // MAPA INTERACTIVO
  // =======================
  if (document.getElementById("map")) {
    console.log("Inicializando mapa...");

    let map;
    let markers = [];

    function initMap() {
      map = L.map("map").setView([28.764337006856657, -105.69750154246044], 8);
      L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png").addTo(map);
      fetchDataMapa();
    }

    function clearMarkers() {
      markers.forEach(marker => map.removeLayer(marker));
      markers = [];
    }

    function fetchDataMapa() {
      const muniId = document.getElementById("locationFilter")?.value || "all";
      const regionId = document.getElementById("regionFilter")?.value || "all";

      const checkedTypes = Array.from(document.querySelectorAll('input[id^="tipo_"]:checked'))
        .map(cb => cb.id.replace("tipo_", ""));

      const typeParam = checkedTypes.length ? `&type_ids=${checkedTypes.join(',')}` : '';
      const muniParam = muniId !== "all" ? `&muni_id=${muniId}` : '';
      const regionParam = regionId !== "all" ? `&region_id=${regionId}` : '';

      const url = `Connections/get_locations.php?${[muniParam, regionParam, typeParam].filter(Boolean).join('&')}`;

      fetch(url)
        .then(res => res.json())
        .then(data => {
          clearMarkers();
          data.forEach(atractivo => {
            const coords = [parseFloat(atractivo.atrac_latitud), parseFloat(atractivo.atrac_longitud)];
            const color = coloresPorRegion[atractivo.atrac_reg_id] || '#FFFFFF'; // color por defecto
            
            const customIcon = L.divIcon({
                className: "custom-marker",
                html: `<div style="background-color: ${color}; width: 20px; height: 20px; border-radius: 50%; border: 2px solid white;"></div>`,
                iconSize: [20, 20],
                iconAnchor: [10, 10]
            });

            const marker = L.marker(coords, { icon: customIcon }).addTo(map);

            marker.bindPopup(`
              <div class='info-box'>
                <img src='administrador/${atractivo.gal_url}' alt='${atractivo.atrac_name}' style='width: 100%; height: auto;'>
                <h3>${atractivo.atrac_name}</h3>
                <p>${atractivo.muni_name}</p>
                <a href='https://www.google.com/maps?q=${coords[0]},${coords[1]}' target='_blank' class='btn-green'>¿Cómo llegar?</a>
                <a href='atractivos.php?id=${atractivo.atrac_id}' class='btn-green'>Ver información</a>
              </div>
            `);

            markers.push(marker);
          });
        })
        .catch(error => console.error("Error al cargar marcadores:", error));
    }

    document.getElementById("locationFilter")?.addEventListener("change", fetchDataMapa);
    document.getElementById("regionFilter")?.addEventListener("change", fetchDataMapa);
    document.querySelectorAll('input[id^="tipo_"]').forEach(cb => cb.addEventListener("change", fetchDataMapa));

    document.getElementById("resetFilters")?.addEventListener("click", () => {
      document.getElementById("locationFilter").value = "all";
      document.getElementById("regionFilter").value = "all";
      document.querySelectorAll('input[id^="tipo_"]').forEach(cb => cb.checked = true);
      fetchDataMapa();
    });

    initMap();
  }

  // =======================
  // TARJETAS Y PAGINACIÓN (atrac_cards)
  // =======================
  if (document.getElementById("atractivosContainer")) {
    console.log("Inicializando tarjetas con filtros...");

    let currentPage = 1;
    const itemsPerPage = 9;
    let totalPages = 0;

    window.goToPage = function (page) {
      currentPage = page;
      fetchDataTarjetas();
    };

    function renderPage(data, page) {
      const start = (page - 1) * itemsPerPage;
      const end = start + itemsPerPage;
      const paginated = data.slice(start, end);

      let container = document.getElementById("atractivosContainer");
      let noResults = document.getElementById("noResults");

      container.classList.remove("show");
      container.classList.add("fade-in2");

      if (data.length === 0) {
        noResults.style.display = "block";
        return;
      } else {
        noResults.style.display = "none";
      }

      setTimeout(() => {
        container.innerHTML = "";
        paginated.forEach(atrac => {
          container.innerHTML += `
            <div class="col-6 col-md-4 col-lg-3 mb-1">
              <div class="card shadow-sm">
                <img src="administrador/${atrac.gal_url}" class="card-img-top" style="height: 270px; object-fit: cover;">
                <div class="card-body text-center">
                  <h5 class="card-title">${atrac.atrac_name}</h5>
                  <p>${atrac.muni_name}</p>
                  <p>Región: ${atrac.reg_name}</p>
                  <button class="btn btn-primary btn-sm mt-2" onclick="verUbicacion(${atrac.atrac_latitud}, ${atrac.atrac_longitud})">Ver en Mapa</button>
                  <button class="btn btn-secondary btn-sm mt-2" onclick="window.location.href='atractivos.php?id=${atrac.atrac_id}'">Más información</button>
                </div>
              </div>
            </div>
          `;
        });

        setTimeout(() => container.classList.add("show"), 190);
        renderPagination(data.length, page);
      }, 190);
    }

    function renderPagination(total, page) {
      totalPages = Math.ceil(total / itemsPerPage);
      const container = document.getElementById("paginationContainer");
      container.innerHTML = "";

      let html = `<nav><ul class="pagination justify-content-center">`;
      if (page > 1) html += `<li class="page-item"><a class="page-link" href="#" onclick="goToPage(${page - 1})">Anterior</a></li>`;
      for (let i = 1; i <= totalPages; i++) {
        html += `<li class="page-item ${i === page ? 'active' : ''}"><a class="page-link" href="#" onclick="goToPage(${i})">${i}</a></li>`;
      }
      if (page < totalPages) html += `<li class="page-item"><a class="page-link" href="#" onclick="goToPage(${page + 1})">Siguiente</a></li>`;
      html += `</ul></nav>`;

      container.innerHTML = html;
    }

    function fetchDataTarjetas() {
      const muniId = document.getElementById("locationFilter").value;
      const regionId = document.getElementById("regionFilter").value;

      const checkedTypes = Array.from(document.querySelectorAll('input[id^="tipo_"]:checked'))
        .map(cb => cb.id.replace("tipo_", ""));

      const typeParam = checkedTypes.length ? `&type_ids=${checkedTypes.join(',')}` : '';
      const muniParam = muniId !== "all" ? `&muni_id=${muniId}` : '';
      const regionParam = regionId !== "all" ? `&region_id=${regionId}` : '';

      const url = `Connections/get_locations.php?${[muniParam, regionParam, typeParam].filter(Boolean).join('&')}`;

      fetch(url)
        .then(res => res.json())
        .then(data => renderPage(data, currentPage))
        .catch(err => console.error("Error tarjetas:", err));
    }

    document.getElementById("locationFilter").addEventListener("change", fetchDataTarjetas);
    document.getElementById("regionFilter").addEventListener("change", fetchDataTarjetas);
    document.querySelectorAll('input[id^="tipo_"]').forEach(cb => cb.addEventListener("change", fetchDataTarjetas));
    document.getElementById("resetFilters").addEventListener("click", () => {
      document.getElementById("locationFilter").value = "all";
      document.getElementById("regionFilter").value = "all";
      document.querySelectorAll('input[id^="tipo_"]').forEach(cb => cb.checked = true);
      fetchDataTarjetas();
    });

    fetchDataTarjetas();
  }

});

function verUbicacion(lat, lon) {
  window.open(`https://www.google.com/maps?q=${lat},${lon}`, "_blank");
}



