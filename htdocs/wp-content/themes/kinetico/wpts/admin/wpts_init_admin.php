<?php

	function wpts_admin_init()
	{
		wp_enqueue_style('jquery');
		wp_enqueue_style("wpts-admin", get_template_directory_uri()."/wpts/admin/css/wpts-admin.css", false, "1.0", "all");
		wp_enqueue_style('thickbox');
		
		wp_enqueue_script( 'wpts-color-picker', get_template_directory_uri() . '/wpts/admin/js/colorpicker/colorpicker.js', array('jquery'), NULL );
		
		wp_enqueue_style( 'wpts-color-picker-style', get_template_directory_uri() . '/wpts/admin/js/colorpicker/colorpicker.css', array(), NULL, 'all' );
		wp_enqueue_script( 'wpts-color-picker-custom', get_template_directory_uri() . '/wpts/admin/js/colorpicker/customCP.js', array('wpts-color-picker'), NULL );	
		
		if(@$_GET["page"] == "theme_slider") {
			wp_enqueue_style( 'wpts-slidermanager', get_template_directory_uri() . '/wpts/admin/slider_manager/slider_manager.css', array(), NULL, 'all' );
			wp_enqueue_script( 'wpts-slidemanager', get_template_directory_uri() . '/wpts/admin/slider_manager/slider_manager.js', array('jquery'), NULL );
		}
		
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-widget');
		wp_enqueue_script('	jquery-ui-mouse');
		wp_enqueue_script('jquery-ui-sortable');
		
		wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');
		wp_register_script('my-upload', get_template_directory_uri().'/wpts/admin/js/upload-box.js', array('jquery','media-upload','thickbox'));
		wp_enqueue_script('my-upload');
	}
			
	function wpts_admin_setup()
	{
		
		// SET MAIN MENU
		add_menu_page("KINETICO", "KINETICO", "administrator", 'theme_general', 'get_option_page' );
		
		// SET SUB MENUS
		add_submenu_page('theme_general', 'General', 'General', "administrator", 'theme_general', 'get_option_page');
		add_submenu_page('theme_general', 'eCommerce', 'eCommerce', "administrator", 'theme_ecommerce', 'get_option_page');
		add_submenu_page('theme_general', 'Colors', 'Colors', "administrator", 'theme_colors', 'get_option_page');
		//add_submenu_page('theme_general', 'Fonts', 'Fonts', "administrator", 'theme_fonts', 'get_option_page');
		add_submenu_page('theme_general', 'Sidebar Manager', 'Sidebar Manager', "administrator", 'theme_sidebar', 'get_option_page');
		add_submenu_page('theme_general', 'Slider Manager', 'Slider Manager', "administrator", 'theme_slider', 'get_option_page');
		
		//MARKER - DONT REMOVE THIS LINE //
	}
		
	add_action('admin_init', 'wpts_admin_init');
	add_action('admin_menu', 'wpts_admin_setup');
	
	function get_option_page()
	{
		include_once ('wptsGenerator.php');
				
		$page = include('pages' . "/" . $_GET['page'] . '.php');
				
		if($page['auto']){
			new wptsGenerator($page['name'],$page['options']);
		}
	}
	
	add_action("admin_init", "slider_meta_box");     
      
    function slider_meta_box(){  

    	@$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;

		$template_file = get_post_meta($post_id,'_wp_page_template',TRUE);

		if ($template_file == 'page_home.php')
		{

       		add_meta_box("sliders", "Select Slider", "slider_meta_options", "page", "normal", "high");  
       		add_action('save_post', 'save_slider');  

       	}
        	
	}
	
	/*** PORTFOLIO META OPTIONS ***/
	  
    function slider_meta_options()
	{  
            global $post;  
            if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;  
            $custom = get_post_custom($post->ID);  
            $slider = $custom["slider-item"][0];  
    ?>  
		<div class="wpts-metabox">
			<div class="wpts-title wpts-title-yellow"><h2>Avaliable Sliders</h2></div>
			
			<div class="wpts_input">
				<label>Slider: </label>
				<select name="slider">
					<option value="">No use any slider</option>
					<?php
					$options = get_option("slider");
					if($options != null) {
						foreach($options as $slide) {
							if($slide[0] != "") :
								$name = $slide[2];
								?>
								<option value="<?php echo $name; ?>" <?php if($slider == $name) echo 'selected="selected"'; ?>><?php echo $name; ?></option>
								<?php
							endif;
						}
					}
					?>
				</select>
			</div>			
		</div>
    <?php  
    }
      
    function save_slider(){  
        global $post;    
      
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){  
            return $post_id;  
        }else{  
            update_post_meta($post->ID, "slider-item", $_POST["slider"]);  
        }  
    }  	

?>