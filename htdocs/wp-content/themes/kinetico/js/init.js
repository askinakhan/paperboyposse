
jQuery(document).ready(function($) {

	$(".product-drop").click(function() {
		$(this).parent().toggleClass("opened");

		return false;
	});

	/** WOO AJAX ADDITION **/
	
	$('.add_to_cart_button.product_type_simple').live('click', function() {
		
		$(this).siblings(".product-wrapper").addClass("loading");
		$(this).siblings(".adding-product").addClass("visible");
		$(this).addClass("loading-btn");

		//alert("ADDING!");
		
	});
	
	$('body').bind('added_to_cart', function() {

		//alert("ADDED!");
	
		

		var $loader = $(".adding-product.visible");

		$loader.addClass("added");

		setTimeout( function() {

			$loader.removeClass("added").removeClass("visible");

			$(".product-wrapper.loading").removeClass("loading");
			$(".add_to_cart_button.loading-btn").removeClass("loading-btn");

		}, 1000);
		
		return false;
	});	
	
	/** ADD GALLERY SHORTCODE **/

});