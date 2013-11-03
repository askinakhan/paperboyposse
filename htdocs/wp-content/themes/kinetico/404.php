<?php
	get_header(); // get the header.php file	
?>		
		<?php
			the_post();
		?>

		<div class="big-header min-padding">
			<h1><?php _e("404", "kinetico"); ?></h1> <p><?php _e("404... Sorry, we can't find the content you're looking for...", "kinetico"); ?></p>
		</div>
		
		<div class="content padding">

			<div class="content content-full content-woo">
				<div class="post">
				
					<?php if(has_post_thumbnail()) : ?>
					<div class="thumbnail">
						<a href="<?php the_permalink(); ?>" class=""><?php the_post_thumbnail(); ?></a>
					</div> <!-- .thumbnail -->
					<?php endif; // if has_thumbnail ?>
					
					<div class="post-block">
						<div class="post-header">
							<div class="post-content">
								<div class="woocommerce_message"><?php _e("404... Sorry, we can't find the content you're looking for...", "kinetico"); ?></div>
							</div>
						</div>
					</div> <!-- .post-content -->
					
				</div> <!-- .post -->
				
			</div> <!-- .content-full-->
			
		</div>
		
<?php
	get_footer(); // get the footer.php file	
?>