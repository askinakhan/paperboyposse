<?php
	/**
	 * The template for displaying product content within loops.
	 *
	 * Override this template by copying it to yourtheme/woocommerce/content-product.php
	 *
	 * @author 		WooThemes
	 * @package 	WooCommerce/Templates
	 * @version     1.6.4
	 */
	
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	
	global $product, $woocommerce_loop;
	
	// Store loop count we're currently on
	if ( empty( $woocommerce_loop['loop'] ) )
		$woocommerce_loop['loop'] = 0;
	
	// Store column count for displaying the grid
	if ( empty( $woocommerce_loop['columns'] ) )
		$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
	
	// Ensure visibility
	if ( ! $product->is_visible() )
		return;
	
	// Increase loop count
	$woocommerce_loop['loop']++;
	
	// Extra post classes
	$classes = array();
	if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
		$classes[] = 'first';
	if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
		$classes[] = 'last';
	
	$options = get_option('sf_neighborhood_options');
	$product_overlay_transition = $options['product_overlay_transition'];
?>
<li <?php post_class( $classes ); ?>>

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

	<?php if ($product_overlay_transition) { ?>
	<figure class="product-transition">			
	<?php } else { ?>
	<figure>
	<?php } ?>
		<?php
			
			$image_html = "";
			
			if ($product->is_on_sale()) {
				
				echo apply_filters('woocommerce_sale_flash', '<span class="onsale">'.__( 'Sale!', 'woocommerce' ).'</span>', $post, $product);
		
			} else {
			
				$postdate 		= get_the_time( 'Y-m-d' );			// Post date
				$postdatestamp 	= strtotime( $postdate );			// Timestamped post date
				$newness 		= 7; 	// Newness in days
	
				if ( ( time() - ( 60 * 60 * 24 * $newness ) ) < $postdatestamp ) { // If the product was published within the newness time frame display the new badge
					echo '<span class="wc-new-badge">' . __( 'New', 'swiftframework' ) . '</span>';
				}
				
			}
			
			if (is_out_of_stock()) {
				echo '<span class="out-of-stock-badge">' . __( 'Out of Stock', 'swiftframework' ) . '</span>';
			}
	
			if ( has_post_thumbnail() ) {
				$image_html = wp_get_attachment_image( get_post_thumbnail_id(), 'shop_catalog' );					
			}
		?>
		
		<a href="<?php the_permalink(); ?>">
			
			<?php
				$attachment_ids = $product->get_gallery_attachment_ids();
				
				$img_count = 0;
				
				if ($attachment_ids) {
					
					echo '<div class="product-image">'.$image_html.'</div>';	
					
					foreach ( $attachment_ids as $attachment_id ) {
						
						if ( get_post_meta( $attachment_id, '_woocommerce_exclude_image', true ) )
							continue;
						
						echo '<div class="product-image">'.wp_get_attachment_image( $attachment_id, 'shop_catalog' ).'</div>';	
						
						$img_count++;
						
						if ($img_count == 1) break;
			
					}
								
				} else {
				
					echo '<div class="product-image">'.$image_html.'</div>';					
					echo '<div class="product-image">'.$image_html.'</div>';
					
				}
			?>			
		</a>
		<figcaption>
			<div class="shop-actions clearfix">
			<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
			</div>
		</figcaption>
	</figure>
	
	<div class="product-details">
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<?php
			$size = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
			echo $product->get_categories( ', ', '<span class="posted_in">' . _n( '', '', $size, 'woocommerce' ) . ' ', '</span>' );
		?>
	</div>

	<?php
		/**
		 * woocommerce_after_shop_loop_item_title hook
		 *
		 * @hooked woocommerce_template_loop_price - 10
		 */
		do_action( 'woocommerce_after_shop_loop_item_title' );
	?>

</li>