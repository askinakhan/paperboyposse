<?php
	get_header(); // get the header.php file	
?>
<?php
	$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
?>		
		<div class="big-header min-padding">
			<h1><?php echo $curauth->nickname; ?></h1>
		</div>
		
		<div class="content padding omega">

			<div class="content content-side">
				<?php if(have_posts()) : ?>
				<?php
					while(have_posts()) : the_post();
				?>
				<div class="post">
				
					<?php if(has_post_thumbnail()) : ?>
					<div class="thumbnail">
						<a href="<?php the_permalink(); ?>" class=""><?php the_post_thumbnail('blog-size', array( 'class' => 'scale-with-grid', 'title' => get_the_title() ) ); ?></a>
					</div> <!-- .thumbnail -->
					<?php endif; // if has_thumbnail ?>
					
					<div class="post-block">
						<div class="post-header">
							<div class="post-date">
									<span class="month"><?php the_time("M"); ?></span>
									<span class="day"><?php the_time("d"); ?></span>
							</div>
							<div class="post-title">
								<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
								<p><?php _e("Written by", "kinetico"); ?> <a href="<?php ?>"><?php the_author(); ?></a>, <?php _e("in", "kinetico"); ?> <?php the_category(", "); ?></p>
							</div> <!-- .post-title -->
							<div class="clearboth"></div>
							<div class="post-content">
								<?php the_excerpt(); ?>
								<div class="read-more"><a href="<?php the_permalink(); ?>"><?php _e("Read More", "kinetico"); ?></a></div>
							</div>
						</div>
					</div> <!-- .post-content -->
					
				</div> <!-- .post -->
				<?php endwhile; ?>
				
				<?php nav_pagination(5, $posts->max_num_pages); ?>
				
				<?php else : ?>
					<div class="error"><?php _e("None posts were found...", "kinetico"); ?></div>
				<?php endif; ?>
			</div> <!-- .content-side -->
			
			<div class="sidebar sidebar-content sidebar-right">
					<?php get_sidebar("right"); ?>
			</div> <!-- .sidebar-right -->
			
			<div class="clearfix"></div>
			
		</div>
		
<?php
	get_footer(); // get the footer.php file	
?>