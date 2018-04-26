// Scripts ******************************************
// **************************************************

jQuery(document).ready(function($){
    var element = $("body");
    var article = $("article");
	
    // Mobile Nav & Form
    $('.BG').click(function(e) {
        e.preventDefault();
        $(this).toggleClass('BG--up');
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
    $('.mobile-container .active-has-children').on('click', function() {
        var submenu = $(this).children('.sub-menu');
        $(this).toggleClass('active-has-children--up');
        $(submenu).slideToggle(200);
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

    // Custom Post Categories
    if ( element.hasClass("term-press-releases") && element.hasClass("post-type-archive-newsroom_post")) {
        $(".cat-item").addClass("current-cat");
        $("#top-menu li:first-of-type").addClass("active-ancestor");
        $("#top-menu li li:nth-of-type(4)").addClass("active-page");
    } 

    if ( element.hasClass("date") && element.hasClass("term-press-releases") && element.hasClass("post-type-archive-newsroom_post")) {
        $(".cat-item").removeClass("current-cat");
        $("#top-menu li:first-of-type").addClass("active-ancestor");
        $("#top-menu li li:nth-of-type(4)").addClass("active-page");
    }

    if ( element.hasClass("term-events") && element.hasClass("post-type-archive-newsroom_post")) {
        $(".cat-item").addClass("current-cat");
        $("#top-menu li:first-of-type").addClass("active-ancestor");
        $("#top-menu li li:nth-of-type(4)").addClass("active-page");
    } 

    if ( element.hasClass("date") && element.hasClass("term-events") && element.hasClass("post-type-archive-newsroom_post")) {
        $(".cat-item").removeClass("current-cat");
        $("#top-menu li:first-of-type").addClass("active-ancestor");
        $("#top-menu li li:nth-of-type(4)").addClass("active-page");
    }

    if ( element.hasClass("term-in-the-news") && element.hasClass("post-type-archive-newsroom_post")) {
        $(".cat-item").addClass("current-cat");
        $("#top-menu li:first-of-type").addClass("active-ancestor");
        $("#top-menu li li:nth-of-type(4)").addClass("active-page");
    } 

    if ( element.hasClass("date") && element.hasClass("term-in-the-news") && element.hasClass("post-type-archive-newsroom_post")) {
        $(".cat-item").removeClass("current-cat");
        $("#top-menu li:first-of-type").addClass("active-ancestor");
        $("#top-menu li li:nth-of-type(4)").addClass("active-page");
    }

    // Blog Categories 
    if ( element.hasClass("date") && article.hasClass("post")) {
        $("#top-menu li:first-of-type").addClass("active-ancestor");
        $("#top-menu li li:nth-of-type(3)").addClass("active-page");
        $("#menu-main-menu li:first-of-type").addClass("active-parent");
        $("#menu-main-menu li li:nth-of-type(3)").addClass("active-page");
    }

    if ( element.hasClass("category") && element.hasClass("archive")) {
        $("#top-menu li:first-of-type").addClass("active-ancestor");
        $("#top-menu li li:nth-of-type(3)").addClass("active-page");
        $("#menu-main-menu li:first-of-type").addClass("active-parent");
        $("#menu-main-menu li li:nth-of-type(3)").addClass("active-page");
    }  

});