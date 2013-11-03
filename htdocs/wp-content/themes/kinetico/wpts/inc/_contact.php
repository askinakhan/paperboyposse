<?php
	
	add_action("admin_init", "contact_meta_box");     

	/*** META DEFINITION ***/
	
	function contact_meta_box(){  

		@$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;

		$template_file = get_post_meta($post_id,'_wp_page_template',TRUE);

		if ($template_file == 'page_contact.php')
		{

       		add_meta_box("contact", "Contact Page Info", "contact_meta_options", "page", "normal", "high");  

       		add_action('save_post', 'save_contact');   	

       	}
	}
	
	/*** META OPTIONS ***/
	  
    function contact_meta_options()
	{  
            global $post;  
            if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;  
            $custom = get_post_custom($post->ID);  
           	$map = $custom["map"][0];  
            $enable_cform = $custom["enable_cform"][0];  

            $enable_social = $custom["enable_social"][0]; 

            $dribbble = $custom["dribbble"][0];  
            $facebook = $custom["facebook"][0]; 
            $forrst = $custom["forrst"][0]; 
            $pinterest = $custom["pinterest"][0]; 
            $rss = $custom["rss"][0]; 
            $twitter = $custom["twitter"][0]; 
    ?>  
		<div class="wpts-metabox">
			<div class="wpts-title wpts-title-red"><h2>Contact Page Configuration</h2></div>

			<div class="wpts_input">
				<label>Google Map Address: </label>
				<input type="text" name="map" value="<?php echo $map; ?>" />
			</div>

			<div class="wpts_input rm_checkbox">
				<label>Enable Contact Form? </label>
				<input type="checkbox" name="enable_cform" <?php if($enable_cform == "on") echo 'checked="checked"'; ?> /> Check it to enable contact form
			</div>
			
			<div class="wpts_input rm_checkbox">
				<label>Enable Social Icons? </label>
				<input type="checkbox" name="enable_social" <?php if($enable_social == "on") echo 'checked="checked"'; ?> /> Check it to enable social icons
			</div>

			<div class="wpts_input">
				<label>Dribbble Address: </label>
				<input type="text" name="dribbble" value="<?php echo $dribbble; ?>" />
			</div>

			<div class="wpts_input">
				<label>Facebook Address: </label>
				<input type="text" name="facebook" value="<?php echo $facebook; ?>" />
			</div>

			<div class="wpts_input">
				<label>Forrst Address: </label>
				<input type="text" name="forrst" value="<?php echo $forrst; ?>" />
			</div>

			<div class="wpts_input">
				<label>Pinterest Address: </label>
				<input type="text" name="pinterest" value="<?php echo $pinterest; ?>" />
			</div>

			<div class="wpts_input">
				<label>RSS Address: </label>
				<input type="text" name="rss" value="<?php echo $rss; ?>" />
			</div>

			<div class="wpts_input">
				<label>Twitter Address: </label>
				<input type="text" name="twitter" value="<?php echo $twitter; ?>" />
			</div>
			
		</div>
    <?php  
    }
	
	/*** SAVE OPTIONS ***/
      
    function save_contact(){  
        global $post;    
      
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){  
            return $post_id;  
        }else{  
            update_post_meta($post->ID, "map", $_POST["map"]);  
            update_post_meta($post->ID, "enable_cform", $_POST["enable_cform"]); 
            update_post_meta($post->ID, "enable_social", $_POST["enable_social"]);

            update_post_meta($post->ID, "dribbble", $_POST["dribbble"]);
            update_post_meta($post->ID, "facebook", $_POST["facebook"]);
            update_post_meta($post->ID, "forrst", $_POST["forrst"]);
            update_post_meta($post->ID, "pinterest", $_POST["pinterest"]);
            update_post_meta($post->ID, "rss", $_POST["rss"]);
            update_post_meta($post->ID, "twitter", $_POST["twitter"]);
        }  
    }