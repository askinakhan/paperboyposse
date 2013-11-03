<?php global $product;

$show_attr = ( get_option( 'woocommerce_enable_dimension_product_attributes' ) == 'yes' ? true : false );

if ( $product->has_attributes() || ( $show_attr && $product->has_dimensions() ) || ( $show_attr && $product->has_weight() ) ) {
	?>
	<li class="attributes_tab"><a href="#tab-attributes"><?php _e('Additional Information', 'kinetico'); ?></a></li>
	<?php
}
?>