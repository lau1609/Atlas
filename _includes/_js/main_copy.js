// JavaScript Document
var touchmoved;
var clickHandler = ('ontouchstart' in document.documentElement ? "touchend" : "click");

$(document).ready(function() {
    
	 /* Menu Small */
    $(document).on(clickHandler, '#menu_btn', function(e) {
		"use strict";
        if(!touchmoved){    
            $('header').toggleClass('opened');
            $('.logo').toggleClass('none');
        }
    }).on('touchmove', function(e){
        touchmoved = true;
    }).on('touchstart', function(){
        touchmoved = false;
    });


    $('#servicios').click(function(e){
    e.preventDefault();
    var varTop = $('.ct2').offset().top-70;
    $('header').toggleClass('opened');
      
      $('body,html').animate({
         
         scrollTop: varTop 
          
      },1000);
  
    
    
	});

	$('#llantas').click(function(e){
    e.preventDefault();
    var varTop = $('.ct4').offset().top-130;
    $('header').toggleClass('opened');
      
      $('body,html').animate({
         
         scrollTop: varTop 
          
      },1000);
  
    
    
	});
/* .top-130;*/
	$('#clientes').click(function(e){
    e.preventDefault();
    var varTop = $('.ct5').offset().top-200;
    $('header').toggleClass('opened');

      $('body,html').animate({
         
         scrollTop: varTop 
          
      },1000);
  
    
    
	});


	$('#contacto').click(function(e){
    e.preventDefault();
    var varTop = $('.ct7').offset().top-130;
    $('header').toggleClass('opened');
   
      $('body,html').animate({
         
         scrollTop: varTop 
          
      },1000);
  
    
    
	});

  if( $('#message_container').length > 0 ){
    $("html, body").animate({ scrollTop: $('.ct7').offset().top },700);
  }

});

// Trigger CSS animations on scroll.
// Detailed explanation can be found at http://www.bram.us/2013/11/20/scroll-animations/

// Looking for a version that also reverses the animation when
// elements scroll below the fold again?
// --> Check https://codepen.io/bramus/pen/vKpjNP

jQuery(function($) {
  
  // Function which adds the 'animated' class to any '.animatable' in view
  var doAnimations = function() {
    
    // Calc current offset and get all animatables
    var offset = $(window).scrollTop() + $(window).height(),
        $animatables = $('.animatable');
    
    // Unbind scroll handler if we have no animatables
    if ($animatables.size() == 0) {
      $(window).off('scroll', doAnimations);
    }
    
    // Check all animatables and animate them if necessary
    $animatables.each(function(i) {
       var $animatable = $(this);
      if (($animatable.offset().top + $animatable.height() - 20) < offset) {
        $animatable.removeClass('animatable').addClass('animated');
      }
    });

  };
  
  // Hook doAnimations on scroll, and trigger a scroll
  $(window).on('scroll', doAnimations);
  $(window).trigger('scroll');

});






$(document).ready(function() {
  /* when modal is opened */
    document.querySelector("#logoUno").addEventListener('click', function() {
    document.querySelector("#popup").style.display = 'block';
    document.querySelector("body").style.overflow = 'hidden';
  });

  /* when modal is closed */
    document.querySelector("#cerrarUno").addEventListener('click', function() {
    document.querySelector("#popup").style.display = 'none';
    document.querySelector("body").style.overflow = 'visible';
  });

}) 

$(document).ready(function() {
    document.querySelector("#logoDos").addEventListener('click', function() {
    document.querySelector("#popup2").style.display = 'block';
    document.querySelector("body").style.overflow = 'hidden';
  });
    document.querySelector("#cerrarDos").addEventListener('click', function() {
    document.querySelector("#popup2").style.display = 'none';
    document.querySelector("body").style.overflow = 'visible';
  });
}) 

$(document).ready(function() {
  document.querySelector("#logoTres").addEventListener('click', function() {
  document.querySelector("#popup3").style.display = 'block';
  document.querySelector("body").style.overflow = 'hidden';
});
  document.querySelector("#cerrarTres").addEventListener('click', function() {
  document.querySelector("#popup3").style.display = 'none';
  document.querySelector("body").style.overflow = 'visible';
});
}) 

$(document).ready(function() {
  document.querySelector("#logoCuatro").addEventListener('click', function() {
  document.querySelector("#popup4").style.display = 'block';
  document.querySelector("body").style.overflow = 'hidden';
});
  document.querySelector("#cerrarCuatro").addEventListener('click', function() {
  document.querySelector("#popup4").style.display = 'none';
  document.querySelector("body").style.overflow = 'visible';
});
}) 

$(document).ready(function() {
  document.querySelector("#logoCinco").addEventListener('click', function() {
  document.querySelector("#popup5").style.display = 'block';
  document.querySelector("body").style.overflow = 'hidden';
});
  document.querySelector("#cerrarCinco").addEventListener('click', function() {
  document.querySelector("#popup5").style.display = 'none';
  document.querySelector("body").style.overflow = 'visible';
});
}) 

$(document).ready(function() {
  document.querySelector("#logoSeis").addEventListener('click', function() {
  document.querySelector("#popup6").style.display = 'block';
  document.querySelector("body").style.overflow = 'hidden';
});
  document.querySelector("#cerrarSeis").addEventListener('click', function() {
  document.querySelector("#popup6").style.display = 'none';
  document.querySelector("body").style.overflow = 'visible';
});
}) 


let items = document.querySelectorAll('.carousel .carousel-item')

items.forEach((el) => {
  const minPerSlide = 4
  let next = el.nextElementSibling
  for (var i=1; i<minPerSlide; i++) {
      if (!next) {
          // wrap carousel by using first child
        next = items[0]
      }
      let cloneChild = next.cloneNode(true)
      el.appendChild(cloneChild.children[0])
      next = next.nextElementSibling
  }
})

document.addEventListener("DOMContentLoaded", function () {
  let myCarousel = new bootstrap.Carousel(document.querySelector("#carouselAtractivos"), {
      interval: false, 
      ride: false 
  });

  document.querySelector("#prevBtn").addEventListener("click", function () {
      myCarousel.prev();
  });

  document.querySelector("#nextBtn").addEventListener("click", function () {
      myCarousel.next();
  });
});