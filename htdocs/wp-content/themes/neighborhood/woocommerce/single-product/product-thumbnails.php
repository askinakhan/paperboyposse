<?php
/**
 * Single Product Thumbnails
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.3
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product, $woocommerce;

$attachment_ids = $product->get_gallery_attachment_ids();

if ( $attachment_ids ) {
	?>
	<?php

		$loop = 0;
		$columns = apply_filters( 'woocommerce_product_thumbnails_columns', 3 );

		foreach ( $attachment_ids as $attachment_id ) {

			$classes = array( 'zoom' );

			if ( $loop == 0 || $loop % $columns == 0 )
				$classes[] = 'first';

			if ( ( $loop + 1 ) % $columns == 0 )
				$classes[] = 'last';

			$image_link = wp_get_attachment_url( $attachment_id );

			if ( ! $image_link )
				continue;

			$image = aq_resize( $image_link, 562, NULL, true, false);
			
			$image_class = esc_attr( implode( ' ', $classes ) );
			$image_title = esc_attr( get_the_title( $attachment_id ) );
			
			if ($image) {
								
				$image_html = '<img src="'.$image[0].'" width="'.$image[1].'" height="'.$image[2].'" />';

				echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<li>%s</li>', $image_html ), $attachment_id, $post->ID, $image_class );
				
			}
				
			$loop++;
		}

	?>
	<?php
}