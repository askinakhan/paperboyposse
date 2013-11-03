<?php
/*
Template Name: Contact Page
*/
?>
<?php
	get_header(); // get the header.php file	
?>		
		<?php
			the_post();
		?>

		<div class="big-header min-padding">
			<h1><?php the_title(); ?></h1> <?php if(get_the_excerpt() != "") : ?> <p><?php echo get_the_excerpt(); ?></p> <?php endif; ?>
		</div>
		
		<div class="content padding">

			<div class="content content-contact">

				<div class="contact-block">
					<div class="post">
					
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

					<div class="gmap-side">
						<?php echo do_shortcode('[gmap address="'.get_post_meta($post->ID, "map", true).'"]'); ?>
					</div> <!-- .gmap-side -->

					<div class="clearfix"></div>
				</div> <!-- .contact-block -->

				<?php $enable_cform = get_post_meta($post->ID, "enable_cform", true); ?>

				<?php if($enable_cform == "on") : ?>
				<div class="contact-form-block">
					<h1><?php _e("SEND US A MESSAGE", "kinetico"); ?></h1>
					<?php echo do_shortcode('[contact_form]'); ?>
				</div> <!-- .social-media --> 
				<?php endif; ?>
				
				<?php $enable_social = get_post_meta($post->ID, "enable_social", true);	?>

				<?php if($enable_social == "on") : ?>
				<div class="social-media">

					<?php $dribbble = get_post_meta($post->ID, "dribbble", true);	?>
					<?php if($dribbble != '') : ?>
					<a href="<?php echo $dribbble; ?>" class="big-social" target="_blank"><img src="<?php echo THEME_DIR; ?>/images/big_social/dribbble.png" alt="Dribbble" /></a>
					<?php endif; ?>

					<?php $facebook = get_post_meta($post->ID, "facebook", true);	?>
					<?php if($facebook != '') : ?>
					<a href="<?php echo $facebook; ?>" class="big-social" target="_blank"><img src="<?php echo THEME_DIR; ?>/images/big_social/facebook.png" alt="Facebook" /></a>
					<?php endif; ?>

					<?php $forrst = get_post_meta($post->ID, "forrst", true);	?>
					<?php if($forrst != '') : ?>
					<a href="<?php echo $forrst; ?>" class="big-social" target="_blank"><img src="<?php echo THEME_DIR; ?>/images/big_social/forrst.png" alt="Forrst" /></a>
					<?php endif; ?>

					<?php $pinterest = get_post_meta($post->ID, "pinterest", true);	?>
					<?php if($pinterest != '') : ?>
					<a href="<?php echo $pinterest; ?>" class="big-social" target="_blank"><img src="<?php echo THEME_DIR; ?>/images/big_social/pinterest.png" alt="Pinterest" /></a>
					<?php endif; ?>

					<?php $rss = get_post_meta($post->ID, "rss", true);	?>
					<?php if($rss != '') : ?>
					<a href="<?php echo $rss; ?>" class="big-social" target="_blank"><img src="<?php echo THEME_DIR; ?>/images/big_social/rss.png" alt="RSS" /></a>
					<?php endif; ?>

					<?php $twitter = get_post_meta($post->ID, "twitter", true);	?>
					<?php if($twitter != '') : ?>
					<a href="<?php echo $twitter; ?>" class="big-social" target="_blank"><img src="<?php echo THEME_DIR; ?>/images/big_social/twitter.png" alt="Twitter" /></a>
					<?php endif; ?>

				</div> <!-- .social-media -->
				<?php endif; ?>

				<div class="clearfix"></div>

			</div> <!-- .content-full-->
			
		</div>
		
<?php
	get_footer(); // get the footer.php file	
?>