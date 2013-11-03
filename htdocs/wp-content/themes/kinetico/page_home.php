<?php
/*
Template Name: Homepage
*/
?>
<?php
	get_header(); // get the header.php file	
	wp_enqueue_script("flex-slider");
?>		
		<?php
			the_post();
		?>

		<?php 
	    $slider = get_post_meta($post->ID, "slider-item", true); 
	    ?>
	    <?php if($slider != "" && $slider != null) 
	    {       
	        
	        $options = get_option("slider");
	        $key = 0;
	        
	            for($i = 0; $i < count($options); $i++) {
	                $k = @array_search($slider, $options[$i]);
	                if($k != false) $key = $i;
	            }
	            
	            $type = $options[$key][1];
	            $fn = 'slider_'.$type;
	            $fn($options[$key]);
	    }
	    ?>

		<div class="content padding padding-home">

			<div class="content content-full content-woo content-home" id="home-area">
				<div class="post">
				
					<?php if(has_post_thumbnail()) : ?>
					<div class="thumbnail">
						<a href="<?php the_permalink(); ?>" class=""><?php the_post_thumbnail(); ?></a>
					</div> <!-- .thumbnail -->
					<?php endif; // if has_thumbnail ?>
					
					<div class="post-block">
						<div class="post-header">
							<div class="post-content">
								<?php $usebuilder = get_post_meta($post->ID, "usebuilder", true);
						
									if($usebuilder) :
										require_once("wpts/layout-builder/init.php");
									else :
										the_content();
									endif;
								?>
							</div>
						</div>
					</div> <!-- .post-content -->
					
				</div> <!-- .post -->
				
			</div> <!-- .content-full-->
			
		</div>
		
<?php
	get_footer(); // get the footer.php file	
?>