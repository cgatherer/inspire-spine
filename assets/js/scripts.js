// Scripts ******************************************
// **************************************************

jQuery(document).ready(function($){
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

 	//open (or close) submenu items. Close all the other open submenu items.
 	// $('.menu-item').click(function(e) {
 	// 	e.preventDefault();
  //   	if($(this).closest(".menu-item").children(".sub-menu").length > 0){
  //           $('.sub-menu').slideToggle(500);
  //           return false;
  //       }            
  //   });
 //  	$('.mobile-nav .menu-item > .sub-menu').parent().hover(function() {
	//   var submenu = $(this).children('.sub-menu');
	  
	//   if ( $(submenu).is(':hidden') ) {
	//     	$(submenu).slideDown(200);
	//   } else {
	//     	$(submenu).slideUp(200);
	//   }
	// });
});