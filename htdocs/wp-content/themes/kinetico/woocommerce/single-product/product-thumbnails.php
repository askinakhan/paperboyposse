<?php
/**
 * Single Product Thumbnails
 */

global $post, $woocommerce;
?>
<div class="thumbnails"><?php	
	$attachments = get_posts( array(
		'post_type' 	=> 'attachment',
		'numberposts' 	=> -1,
		'post_status' 	=> null,
		'post_parent' 	=> $post->ID,
		'post__not_in'	=> array( get_post_thumbnail_id() ),
		'post_mime_type'=> 'image',
		'orderby'		=> 'menu_order',
		'order'			=> 'ASC'
	) );
	if ($attachments) {

		?>

		<div class="flexslider flexslider-product">
 			<ul class="slides">

		<?php
		
		$loop = 0;
		$columns = apply_filters( 'woocommerce_product_thumbnails_columns', 3 );
		
		foreach ( $attachments as $key => $attachment ) {
			
			if ( get_post_meta( $attachment->ID, '_woocommerce_exclude_image', true ) == 1 ) 
				continue;
				
			$classes = array( 'zoom' );
			
			if ( $loop == 0 || $loop % $columns == 0 ) 
				$classes[] = 'first';
			
			if ( ( $loop + 1 ) % $columns == 0 ) 
				$classes[] = 'last';

			$imageSrc = wp_get_attachment_image( $attachment->ID,  'single-shop-size' );

			?>

			<li>
    			<?php echo $imageSrc; ?>
		    </li>

		    <?php
			
			$loop++;

		}

		?>
			</ul>
		</div>

		<script type="text/javascript" charset="utf-8">
		  jQuery(window).load(function() {
		    jQuery('.flexslider-product').flexslider({
		    	directionNav: false,
		    	animation: "slide"
		    });
		  });
		</script>

		<?php
		
	}
?></div>