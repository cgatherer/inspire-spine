// Scripts ******************************************
// **************************************************

jQuery(document).ready(function($){
	$(".BG").click(function(e) {
        e.preventDefault();
        $(".form-area").toggle(200);
    });
});