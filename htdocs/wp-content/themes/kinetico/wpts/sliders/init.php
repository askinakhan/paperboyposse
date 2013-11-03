<?php
	/*== ENQUEUE STYLES ==**/
	
	function wpts_sliders_enqueue_styles() {
		if(!is_admin()) :
			
			/*
			wp_register_style( 'anythingslider', THEME_DIR . '/css/anythingslider.css', array(), '1', 'all' );
			wp_enqueue_style( 'anythingslider' );
			*/
		endif;
	}
	add_action( 'init', 'wpts_sliders_enqueue_styles' );
	
	/*== ENQUEUE SCRIPTS ==**/
	
	function wpts_sliders_enqueue_scripts() {
		if(!is_admin()) :

			/*
			wp_enqueue_script( 'anythingslider', get_template_directory_uri() . '/js/jquery.anythingslider.min.js', array('jquery'), NULL );
			*/
			
		endif;
	}
	add_action( 'init', 'wpts_sliders_enqueue_scripts' );
?>