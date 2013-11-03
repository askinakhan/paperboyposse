<?php
/**
 * Loop-shop (deprecated)
 *
 * Outputs a product loop
 *
 * @package WooCommerce
 * @deprecated-since WooCommerce 1.6
 */
 
_deprecated_file( basename(__FILE__), '1.6' );

global $woocommerce_loop;
?>

<?php if ( have_posts() ) : ?>

	<?php do_action('woocommerce_before_shop_loop'); ?>

	<ul class="products">
	
		<?php woocommerce_product_subcategories(); ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php woocommerce_get_template_part( 'content', 'product' ); ?>

		<?php endwhile; // end of the loop. ?>
		
	</ul>

	<?php do_action('woocommerce_after_shop_loop'); ?>

<?php else : ?>

	<?php if ( ! woocommerce_product_subcategories( array( 'before' => '<ul class="products">', 'after' => '</ul>' ) ) ) : ?>
			
		<div class="woocommerce_message"><?php _e( 'No products found which match your selection.', 'woocommerce' ); ?></div>
			
	<?php endif; ?>

<?php endif; ?>

<div class="clear"></div>