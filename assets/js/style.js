$(document).ready(function() {
    $('#rent').DataTable();
});
$(document).ready(function() {
    $('#sale').DataTable();
});
jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
$('.nav-link').on("click",function(){
	$('.navbar-nav').find('.active').removeClass("active");
	$(this).parent().addClass("active");
});
