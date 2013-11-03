<?php
	get_header(); // get the header.php file	
?>		
		<?php
			the_post();
		?>

		<div class="big-header min-padding">
			<h1><?php the_title(); ?></h1> <?php if(get_the_excerpt() != "") : ?> <p><?php echo get_the_excerpt(); ?></p> <?php endif; ?>
		</div>
		
		<div class="content padding omega">

			<div class="content content-side">
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

			</div> <!-- .content-side -->
			
			<div class="sidebar sidebar-content sidebar-right">
				<!--SIDEBAR STARTS-->
				<?php $csidebar = get_post_meta($post->ID, "sidebar", true); ?>

	            <?php if($csidebar == '' || !is_dynamic_sidebar($csidebar) ) : ?>
					<?php get_sidebar('right')?>
	            <?php else : ?>
	            	<ul>
	                	<?php wpts_sidebar($csidebar); ?>
	          	 	</ul>
	            <?php endif; ?>
			</div> <!-- .sidebar-right -->
			
			<div class="clearfix"></div>
			
		</div>
		
<?php
	get_footer(); // get the footer.php file	
?>