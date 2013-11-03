
jQuery(document).ready(function($){

	$(".gallery .gallery-icon a").each(function(e, i) {
		var id = $(this).parents(".gallery").attr("id");
		$(this).attr("rel", "prettyPhoto["+id+"]");
	});

    $("a[rel^='prettyPhoto']").prettyPhoto();
});