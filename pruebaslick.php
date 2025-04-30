<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Prueba Slick</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
  <style>
    .fade img {
      height: 300px;
      object-fit: cover;
    }
  .slick-carousel img {
    max-height: 400px;
    width: auto;
    margin: 0 auto;
  }

  .slick-prev:before,
  .slick-next:before {
    color: black;
    font-size: 30px;
  }
</style>
  </style>
</head>
<body>

<div class="container my-5">
  <div class="carousel-fade slick-carousel">
    <div>
      <img src="_images/arareko1.jpg" class="img-fluid rounded mx-auto d-block" alt="Paisaje nevado">
    </div>
    <div>
      <img src="_images/arareko2.jpg" class="img-fluid rounded mx-auto d-block" alt="Montañas">
    </div>
    <div>
      <img src="_images/arareko3.jpg" class="img-fluid rounded mx-auto d-block" alt="Bosque">
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
  $(document).ready(function(){
    $('.carousel-fade').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: true,
      arrows: true,
      autoplay: true,
      autoplaySpeed: 3000,
      fade: true,
      cssEase: 'linear'
    });
  });
</script>

</body>
</html>
