<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header('shop'); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action('woocommerce_before_main_content');
	?>
	
	<?php
		$options = get_option('sf_neighborhood_options');
		
		$default_show_page_heading = $options['default_show_page_heading'];
		$default_page_heading_bg_alt = $options['woo_page_heading_bg_alt'];
		
		$sidebar_config = $options['woo_sidebar_config'];
		$left_sidebar = $options['woo_left_sidebar'];
		$right_sidebar = $options['woo_right_sidebar'];
		
		if ($sidebar_config == "") {
			$sidebar_config = 'right-sidebar';
		}
		if ($left_sidebar == "") {
			$left_sidebar = 'woocommerce-sidebar';
		}
		if ($right_sidebar == "") {
			$right_sidebar = 'woocommerce-sidebar';
		}
		
		if (isset($_GET['sidebar'])) {
			$sidebar_config = $_GET['sidebar'];
		}
		
		sf_set_sidebar_global($sidebar_config);
		
		global $sidebars, $woocommerce_loop;
		
		$columns = 4;
				
		if ($sidebars == "no-sidebars") {
			$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
		} else if ($sidebars == "both-sidebars") {
			$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 2 );
			$columns = 2;
		} else {
			$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 3 );
			$columns = 3;
		}
		
		$page_wrap_class = $page_class = $content_class = '';
		if ($sidebar_config == "left-sidebar") {
		$page_wrap_class = 'has-left-sidebar has-one-sidebar row';
		$page_class = "span9 push-right clearfix";
		$content_class = "clearfix";
		} else if ($sidebar_config == "right-sidebar") {
		$page_wrap_class = 'has-right-sidebar has-one-sidebar row';
		$page_class = "span9 clearfix";
		$content_class = "clearfix";
		} else if ($sidebar_config == "both-sidebars") {
		$page_wrap_class = 'has-both-sidebars row';
		$page_class = "span9 clearfix";
		$content_class = "span6 clearfix";
		} else {
		$page_wrap_class = 'has-no-sidebar';
		$page_class = "row clearfix";
		$content_class = "span12 clearfix";
		}
		
		global $include_isotope, $has_products;
		$include_isotope = true;
		$has_products = true;
		
	?>

	<?php if ( apply_filters( 'woocommerce_show_page_title', true )  && $default_show_page_heading) : ?>
			
	<div class="row">
		<div class="page-heading span12 clearfix alt-bg <?php echo $default_page_heading_bg_alt; ?>">
			<div class="heading-text">
				<h1><?php woocommerce_page_title(); ?></h1>
			</div>
			<?php 
				// BREADCRUMBS
				echo sf_breadcrumbs();
			?>
		</div>
	</div>

	<?php endif; ?>
	
	
	<div class="inner-page-wrap <?php echo $page_wrap_class; ?> clearfix">
		
		<!-- OPEN section -->
		<section class="<?php echo $page_class; ?>">
		
			<div class="page-content <?php echo $content_class; ?>">
				
			<?php do_action( 'woocommerce_archive_description' ); ?>
	
			<?php if ( have_posts() ) : ?>
	
				<?php
					/**
					 * woocommerce_before_shop_loop hook
					 *
					 * @hooked woocommerce_result_count - 20
					 * @hooked woocommerce_catalog_ordering - 30
					 */
					do_action( 'woocommerce_before_shop_loop' );
				?>
	
				<?php woocommerce_product_loop_start(); ?>
	
					<?php woocommerce_product_subcategories(); ?>
	
					<?php while ( have_posts() ) : the_post(); ?>
	
						<?php woocommerce_get_template_part( 'content', 'product' ); ?>
	
					<?php endwhile; // end of the loop. ?>
	
				<?php woocommerce_product_loop_end(); ?>
	
				<?php
					/**
					 * woocommerce_after_shop_loop hook
					 *
					 * @hooked woocommerce_pagination - 10
					 */
					do_action( 'woocommerce_after_shop_loop' );
				?>
	
			<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
	
				<?php woocommerce_get_template( 'loop/no-products-found.php' ); ?>
	
			<?php endif; ?>
			
			</div>
	
			<?php if ($sidebar_config == "both-sidebars") { ?>
			<aside class="sidebar left-sidebar span3">
				<?php dynamic_sidebar($left_sidebar); ?>
			</aside>
			<?php } ?>
		
		<!-- CLOSE section -->
		</section>
	
		<?php if ($sidebar_config == "left-sidebar") { ?>
				
		<aside class="sidebar left-sidebar span3">
			<?php dynamic_sidebar($left_sidebar); ?>
		</aside>
	
		<?php } else if ($sidebar_config == "right-sidebar") { ?>
			
		<aside class="sidebar right-sidebar span3">
			<?php dynamic_sidebar($right_sidebar); ?>
		</aside>
		
		<?php } else if ($sidebar_config == "both-sidebars") { ?>
	
		<aside class="sidebar right-sidebar span3">
			<?php dynamic_sidebar($right_sidebar); ?>
		</aside>
		
		<?php } ?>
			
	</div>

<?php get_footer('shop'); ?>