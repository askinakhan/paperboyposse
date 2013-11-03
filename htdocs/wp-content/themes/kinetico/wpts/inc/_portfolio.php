<?php
/*== PORTFOLIO ==*/
	
	add_action('init', 'project_custom_init');  
	
	/*-- Custom Post Init Begin --*/
	function project_custom_init()
	{
	  $labels = array(
		'name' => _x('Projects', 'post type general name'),
		'singular_name' => _x('Project', 'post type singular name'),
		'add_new' => _x('New Project', 'project'),
		'add_new_item' => __('Add New Project'),
		'edit_item' => __('Edit Project'),
		'new_item' => __('New Project'),
		'view_item' => __('View Project'),
		'search_items' => __('Search Projects'),
		'not_found' =>  __('No projects found'),
		'not_found_in_trash' => __('No projects found in Trash'),
		'parent_item_colon' => '',
		'menu_name' => 'Projects'

	  );
	  
	 $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','author','thumbnail','excerpt','comments')
	  );
	  // The following is the main step where we register the post.
	  register_post_type('project',$args);
	  
	  // Filter Portfolio
	  $labels = array(
		'name' => _x( 'Filters', 'taxonomy general name' ),
		'singular_name' => _x( 'Filter', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Filters' ),
		'all_items' => __( 'All Filters' ),
		'parent_item' => __( 'Parent Filter' ),
		'parent_item_colon' => __( 'Parent Filter:' ),
		'edit_item' => __( 'Edit Filters' ),
		'update_item' => __( 'Update Filter' ),
		'add_new_item' => __( 'Add New Filter' ),
		'new_item_name' => __( 'New Filter Name' ),
	  );
		// Filter Portfolio - Register
		register_taxonomy('filter-portifolio', array('project'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'filter-portifolio' ),
	  ));
	  
	  // Portfolio - Labels
	  $labels = array(
		'name' => _x( 'Portfolios', 'taxonomy general name' ),
		'singular_name' => _x( 'Portfolio', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Portfolios' ),
		'all_items' => __( 'All Portfolios' ),
		'parent_item' => __( 'Parent Portfolio' ),
		'parent_item_colon' => __( 'Parent Portfolio:' ),
		'edit_item' => __( 'Edit Portfolios' ),
		'update_item' => __( 'Update Portfolio' ),
		'add_new_item' => __( 'Add New Portfolio' ),
		'new_item_name' => __( 'New Portfolio Name' ),
	  );
		// Portfolio - Register
		register_taxonomy('type-portfolio', array('project'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'type-portfolio' ),
	  ));
	  
	}
	/*-- Custom Post Init Ends --*/
	
	// Add filter to ensure the text Project, or project, is displayed when a user updates a book
	add_filter('post_updated_messages', 'project_updated_messages');
	
	function project_updated_messages( $messages ) {
	  global $post, $post_ID;

	  $messages['project'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Project updated. <a href="%s">View project</a>'), esc_url( get_permalink($post_ID) ) ),
		2 => __('Custom field updated.'),
		3 => __('Custom field deleted.'),
		4 => __('Project updated.'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Project restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Project published. <a href="%s">View project</a>'), esc_url( get_permalink($post_ID) ) ),
		7 => __('Project saved.'),
		8 => sprintf( __('Project submitted. <a target="_blank" href="%s">Preview project</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
		9 => sprintf( __('Project scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview project</a>'),
		  // translators: Publish box date format, see http://php.net/date
		  date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
		10 => sprintf( __('Project draft updated. <a target="_blank" href="%s">Preview project</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	  );

	  return $messages;
	}
	
/**********************************
*********** META BOXES ************
**********************************/

	function wpts_meta_uploader()
	{
	}
	
	add_action('admin_init', 'wpts_meta_uploader');

/**********************************
*********** META BOXES ************
**********************************/

	add_action("admin_init", "portfolio_meta_box");     
      
    function portfolio_meta_box(){  
		// PORTFOLIO META OPTIONS 
        add_meta_box("projInfo-meta", "Portfolio Options", "portfolio_meta_options", "page", "normal", "high");  
		// PORTFOLIO THUMBNAILS
		add_meta_box("projects-thumbs-meta", "Portfolio Thumbs", "portfolio_thumb_meta_options", "project", "normal", "high");
    }    
      
/*** PORTFOLIO META OPTIONS ***/
	  
    function portfolio_meta_options()
	{  
            global $post;  
            if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;  
            $custom = get_post_custom($post->ID);  
            $portfolioType = $custom["portfolio-type"][0];  
    ?>  
		<div class="wpts-metabox">
		
			<div class="wpts-title wpts-title-gray"><h2>Portfolios</h2></div>
			
			<div class="wpts_input">
			<label>Use this Portfolio:</label>
				<select name="portfolio-type">
					<?php
					$portfolioTypes = get_terms("type-portfolio");	
					
					foreach($portfolioTypes as $type) {
						$name = $type->name;
						$selected = '';
						if($name == $portfolioType) $selected = 'selected="selected"';
						
						echo '<option value="'.$name.'" '.$selected.'>'.$name.'</option>';
					}				
					?>
				</select>
			</div>
			
		</div>
    <?php  
    }  
	
	add_action('save_post', 'save_project_link');   
      
    function save_project_link(){  
        global $post;    
      
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){  
            return $post_id;  
        }else{  
            update_post_meta($post->ID, "portfolio-type", $_POST["portfolio-type"]);  
        }  
    }  
	
/*** PORTFOLIO THUMBNAILS ***/
	
	function portfolio_thumb_meta_options()
	{  
            global $post;  
            if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;  
            $custom = get_post_custom($post->ID);  
            $gridThumb = $custom["grid-thumb"][0];   
            $project_url = $custom["project-url"][0];   
    ?>  
		<div class="wpts-metabox">
		
			<div class="wpts-title wpts-title-salmon"><h2>Project Info</h2></div>
			
			<div class="wpts_input">
				<div class="preview">
					<?php if($gridThumb != '') : ?>
						<img src="<?php echo $gridThumb; ?>" alt="PREVIEW" width="80" height="65" />
					<?php endif; ?>
				</div>
				<div class="wpts-row preview-row">
					<label>Grid Portfolio Thumb (220x140) </label>
					<input type="text" class="upload-admin-input" id="grid-thumb" name="grid-thumb" value="<?php echo $gridThumb; ?>" /> <input class="upload-admin" type="button" value="Upload" />
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
			
			<div class="wpts_input">
				<label>External URL</label>
				<input type="text" id="project-url" name="project-url" value="<?php echo $project_url; ?>" />
			</div>
			<div class="clear"></div>
		</div>
    <?php  
    }  
	
	add_action('save_post', 'save_project_thumbs_link');   
      
    function save_project_thumbs_link(){  
        global $post;    
      
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){  
            return $post_id;  
        }else{  
            update_post_meta($post->ID, "grid-thumb", $_POST["grid-thumb"]);    
            update_post_meta($post->ID, "project-url", $_POST["project-url"]);    
        }  
    }  

?>