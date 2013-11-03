<?php
/**
 * Single Product Title
 */
?>
<div class="title">
	<h1 itemprop="name" class="product_title entry-title"><?php the_title(); ?></h1>
	<?php
	global $post;

	if ($post->post_excerpt ) :
	?>
	<div itemprop="description" class="product-description">
		<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>
	</div>
	<?php endif; ?>

</div>