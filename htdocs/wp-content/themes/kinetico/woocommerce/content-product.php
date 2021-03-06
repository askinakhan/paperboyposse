<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @package WooCommerce
 * @since WooCommerce 1.6
 */
 
global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) 
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) 
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 3 );

// Ensure visibilty
if ( ! $product->is_visible() ) 
	return; 

// Increase loop count
$woocommerce_loop['loop']++;
?>

<?php
	if ( ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] == 0 ) 
		echo '<li class="clear-listing"></li>';
?>

<li class="product <?php 
	if ( $woocommerce_loop['loop'] % $woocommerce_loop['columns'] == 0 ) 
		echo 'last'; 
	elseif ( ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] == 0 ) 
		echo 'first'; 
	?><?php if( ( $woocommerce_loop['loop'] % 2 ) == 0 ) echo ' landscape-two'; ?>">

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
		
	<a href="<?php the_permalink(); ?>" class="product-wrapper">
				
		<?php
			/** 
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */	  
			do_action( 'woocommerce_before_shop_loop_item_title' ); 
		?>
		
		<h3><?php the_title(); ?></h3>

		<div class="excerpt"><?php the_excerpt(); ?></div>

		<?php
			/** 
			 * woocommerce_after_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_template_loop_price - 10
			 */	  
			do_action( 'woocommerce_after_shop_loop_item_title' ); 
		?>
	
	</a>

	<div class="adding-product"></div>
	
	<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
			
</li>