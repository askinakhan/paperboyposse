<?php

	$wpts_sidebars = wpts_get_option("sidebar", "sidebars");

	if($wpts_sidebars != '' && $wpts_sidebars != null) {

		$sides = $wpts_sidebars;

		$sides = explode(";", $sides);

		foreach ($sides as $side) {
			if($side != '') {

				$sideID = strtolower($side);
				$sideID = str_replace(' ', '', $side);
				$sideID = str_replace(',', '', $side);
				$sideID = str_replace(';', '', $side);

				register_sidebar( array(
				'id' => $sideID,
				'name'        => $side,
				'description' => 'Custom Sidebar',
				'before_title'  => '<h3 class="widgettitle"><span>',
				'after_title'   => '</span></h3>',
				'before_widget' => '<li id="%1$s" class="widget %2$s">',
				'after_widget'  => '</li>'
				) );
			}
		}
	}

	/*** SIDEBARS CUSTOM ***/

	add_action("admin_init", "sidebar_meta_box");     
      
    function sidebar_meta_box(){  
		// PORTFOLIO META OPTIONS 
        add_meta_box("wpts-sidebar", "Select Sidebars", "sidebar_meta_options", "page", "normal", "high"); 
        add_meta_box("wpts-sidebar", "Select Sidebars", "sidebar_meta_options", "post", "normal", "high");  
	}

	
	  
    function sidebar_meta_options()
	{  
            global $post;  
            if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;  
            $custom = get_post_custom($post->ID);  
            $sidebar = $custom["sidebar"][0];  
    ?>  
		<div class="wpts-metabox">
			<div class="wpts-title wpts-title-gray"><h2>Custom Sidebars</h2></div>
			
			<div class="wpts_input">
				<label>Sidebar: </label>
				<select name="sidebar">
					<option value="">Default Sidebar</option>
					<?php

						$wpts_sidebars = wpts_get_option("sidebar", "sidebars");

						if($wpts_sidebars != '' && $wpts_sidebars != null) {

							$sides = $wpts_sidebars;

							$sides = explode(";", $sides);

							foreach ($sides as $side) {
								if($side != '') {
									?>
									<option value="<?php echo $side; ?>" <?php if($sidebar == $side) echo 'selected="selected"'; ?>><?php echo $side; ?></option>
								<?php
								}
							}
						}
					?>
				</select>
			</div>			
		</div>
    <?php  
    }

	add_action('save_post', 'save_sidebar');   
      
    function save_sidebar(){  
        global $post;    
      
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){  
            return $post_id;  
        }else{  
            update_post_meta($post->ID, "sidebar", $_POST["sidebar"]);  
        }  
    }  	

    function wpts_sidebar($name) {
    	?>
			<?php dynamic_sidebar( $name ); ?>    			
		<?php
    }

?>