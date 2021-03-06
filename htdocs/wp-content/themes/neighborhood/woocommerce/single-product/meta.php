<?php
/**
 * Single Product Meta
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product;

$options = get_option('sf_neighborhood_options');
?>
<div class="product_meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>
	
	<p>
	<?php if ( $product->is_type( array( 'simple', 'variable' ) ) && get_option( 'woocommerce_enable_sku' ) == 'yes' && $product->get_sku() ) : ?>
		<span itemprop="productID" class="sku_wrapper"><?php _e( 'Product code:', 'swiftframework' ); ?> <span class="sku"><?php echo $product->get_sku(); ?></span> - </span>
	<?php endif; ?>
	<span class="need-help"><?php _e("Need Help?", "swiftframework"); ?> <a href="#email-form" class="inline" data-toggle="modal"><?php _e("Contact Us", "swiftframework"); ?></a></span>
	<span class="leave-feedback"><a href="#feedback-form" class="inline" data-toggle="modal"><?php _e("Leave Feedback", "swiftframework"); ?></a></span>
	</p>
	<p>
	<?php
		$size = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
		echo $product->get_categories( ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', $size, 'woocommerce' ) . ' ', '.</span>' );
	?>
	</p>
	<p>
	<?php
		$size = sizeof( get_the_terms( $post->ID, 'product_tag' ) );
		echo $product->get_tags( ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', $size, 'woocommerce' ) . ' ', '.</span>' );
	?>
	</p>
	<?php do_action( 'woocommerce_product_meta_end' ); ?>
	
	<div id="email-form" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="email-form-modal" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="email-form-modal"><?php _e("Contact Us", "swiftframework"); ?></h3>
		</div>
		<div class="modal-body">
			
			<?php echo do_shortcode($options['email_modal']); ?>
			
		</div>
	</div>
	
	<div id="feedback-form" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="feedback-form-modal" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="feedback-form-modal"><?php _e("Leave Feedback", "swiftframework"); ?></h3>
		</div>
		<div class="modal-body">
			
			<?php echo do_shortcode($options['feedback_modal']); ?>
			
		</div>
	</div>

</div>