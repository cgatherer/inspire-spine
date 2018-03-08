// Scripts ******************************************
// **************************************************

jQuery(document).ready(function($){
	  // Mobile Nav & Form
    $('.BG').click(function(e) {
        e.preventDefault();
        $('.form-area').slideToggle(500);
    });

    $('.BG--mobile').click(function(e) {
        e.preventDefault();
        $('.form-area--mobile').slideToggle(500);
    });

    $('.mobile-menu').click(function(e) {
        e.preventDefault();
        $('.mobile-nav').slideToggle(500);
    	  $(this).find("i").toggleClass("fa-times-circle");
    });

    // Change 'hover' to 'click' if you want to
    $('.active-has-children').on('click', function() {
        var submenu = $(this).children('.sub-menu');

        if ( $(submenu).is(':hidden') ) {
            // $(submenu).show();
            $(submenu).slideToggle(200);
        } else {
            // $(submenu).hide();
            $(submenu).slideToggle(200);
        }
    });

    // Sticky Header
    $(window).scroll(function(){
      if ($(window).scrollTop() >= 200) {
         $('#main-header').addClass('fixed-header');
      }
      else {
         $('#main-header').removeClass('fixed-header');
      }
    });
});