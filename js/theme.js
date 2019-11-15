;(function($){
    "use strict"


    var nav_offset_top = $('header').height() + 50; 
/*-------------------------------------------------------------------------------
Navbar 
-------------------------------------------------------------------------------*/

//*Barra de navegacion 
function navbarFixed(){
    if ( $('.header_area').length ){ 
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();   
            if (scroll >= nav_offset_top ) {
                $(".header_area").addClass("navbar_fixed");
            } else {
                $(".header_area").removeClass("navbar_fixed");
            }
        });
    };
};
navbarFixed();





$(document).ready(function() {


/*-------------------------------------------------------------------------------
Barra de comentarios 
-------------------------------------------------------------------------------*/

$('.testi_slider').owlCarousel({
    loop: true,
    margin: 30,
    items: 1,
    nav: false,
    autoplay: 2500,
    smartSpeed: 1500,
    dots: true,
    responsiveClass: true
})


/*-------------------------------------------------------------------------------
Carusel de los editoriales
-------------------------------------------------------------------------------*/
$(".brand-carousel").owlCarousel({
    items: 1,
    autoplay:false,
    loop:true,
    nav:false,
    margin: 30,
    dots:false,
    responsive: {
        0: {
            items: 1,
        },
        420: {
            items: 1,
        },
        480: {
            items: 3,
        },
        768: {
            items: 3,
        },
        992: {
            items: 5,
        }
    }
});



});


})(jQuery)