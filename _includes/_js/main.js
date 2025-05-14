$(document).ready(function () {
    console.log("Documento listo");

    // Efecto fade-in
    setTimeout(() => {
        document.querySelector(".fade-in")?.classList.add("show");
    }, 500); // Retraso de 500ms para hacer la animación más natural

// Verificamos si existe el contenedor del mapa
if ($("#map").length) {
    console.log("Cargando el mapa interactivo...");

    // Inicializamos el mapa
    var map = L.map("map").setView([28.1494, -108.2296], 10);
    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png").addTo(map);

    // Función para cargar las ubicaciones desde el servidor
    fetch("Connections/get_locations.php")
        .then(response => response.json())
        .then(data => {
            data.forEach(function (atractivo) {
                var coords = [parseFloat(atractivo.atrac_latitud), parseFloat(atractivo.atrac_longitud)];
                var marker = L.marker(coords).addTo(map);
                
                // Crear el contenido del popup con la info del atractivo
                marker.bindPopup(`
                    <div class='info-box'>
                        <img src='${atractivo.gal_url}' alt='${atractivo.atrac_name}' style='width: 100%; height: auto;'>
                        <h3>${atractivo.atrac_name}</h3>
                        <p>${atractivo.muni_name}</p>
                        <a href='https://www.google.com/maps?q=${coords[0]},${coords[1]}' target='_blank' class='btn-green'>¿Cómo llegar?</a>
                        <a href='/../../../atlas/atractivos.php' class='btn-green'>Ver información</a>
                    </div>
                `);
            });
        })
        .catch(error => console.error("Error al cargar las ubicaciones:", error));
}


    // carrusel Slick
    var touchmoved;
    var clickHandler = ('ontouchstart' in document.documentElement ? "touchend" : "click");

    $('#carouselAtractivos').slick({
        slidesToShow: 3, // Muestra 3 tarjetas a la vez
        slidesToScroll: 1, // Se mueve de una en una
        infinite: true, // Hace un loop infinito
        dots: true, // Muestra los puntitos de navegación
        arrows: true, // Activa las flechas de navegación
        prevArrow: '<button type="button" class="slick-prev">‹</button>',
        nextArrow: '<button type="button" class="slick-next">›</button>',
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });

    if (typeof showAllMarkers !== "function") {
        console.error("Error: showAllMarkers no está definida.");
    } else {
        showAllMarkers();
    }

    let currentPage = 1; // Página actual
    const itemsPerPage = 9; // Número de tarjetas por página
    let totalPages = 0; // Total de páginas
    
    // Hacer que las funciones sean globales
    window.goToPage = function(page) {
        currentPage = page;
        fetchData(); // Llamamos a la función para recargar los datos
    };
    
    function renderPage(data, page) {
        const startIndex = (page - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;
        const paginatedData = data.slice(startIndex, endIndex);
    
        let container = document.getElementById("atractivosContainer");
        container.innerHTML = ""; // Limpiamos el contenedor antes de cargar
    
        paginatedData.forEach(atractivo => {
            let card = `
                <div class="col-6 col-md-4 col-lg-3 mb-1">
                    <div class="card shadow-sm">
                        <img src="${atractivo.gal_url}" class="card-img-top" alt="${atractivo.atrac_name}" style="height: 270px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="card-title">${atractivo.atrac_name}</h5>
                            <p class="card-text">${atractivo.muni_name}</p>
                            <button class="btn btn-primary btn-sm mt-2" onclick="verUbicacion(${atractivo.atrac_latitud}, ${atractivo.atrac_longitud})">
                                Ver en Mapa 
                            </button>
                            <button class="btn btn-secondary btn-sm mt-2" onclick="window.location.href='atractivos.php?id=${atractivo.atrac_id}'">
                                Más información
                            </button>
                        </div>
                    </div>
                </div>
            `;
            container.innerHTML += card;
        });
    
        renderPagination(data.length, page);
    }
    
    function renderPagination(totalItems, page) {
        totalPages = Math.ceil(totalItems / itemsPerPage);
        const paginationContainer = document.getElementById("paginationContainer");
        paginationContainer.innerHTML = ""; // Limpiar los botones de paginación
    
        let paginationHTML = `
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
        `;
    
        // Botón "Anterior"
        if (page > 1) {
            paginationHTML += `
                <li class="page-item">
                    <a class="page-link" href="#" onclick="goToPage(${page - 1})">Previous</a>
                </li>
            `;
        }
    
        // Botones de páginas
        for (let i = 1; i <= totalPages; i++) {
            paginationHTML += `
                <li class="page-item ${i === page ? 'active' : ''}">
                    <a class="page-link" href="#" onclick="goToPage(${i})">${i}</a>
                </li>
            `;
        }
    
        // Botón "Siguiente"
        if (page < totalPages) {
            paginationHTML += `
                <li class="page-item">
                    <a class="page-link" href="#" onclick="goToPage(${page + 1})">Next</a>
                </li>
            `;
        }
    
        paginationHTML += `
                </ul>
            </nav>
        `;
    
        paginationContainer.innerHTML = paginationHTML;
    }
    
    function fetchData() {
        fetch("Connections/get_locations.php")
            .then(response => response.json())
            .then(data => {
                renderPage(data, currentPage);
            })
            .catch(error => console.error("Error al cargar los datos:", error));
    }
    
    // Carga inicial
    fetchData();

});

// Función para abrir Google Maps con la ubicación
function verUbicacion(lat, lon) {
    window.open(`https://www.google.com/maps?q=${lat},${lon}`, "_blank");
}
