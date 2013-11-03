<?php
/**
 * Loop Price
 */

global $product;
?>
<?php if ($price_html = $product->get_price_html()) : ?>
	<span class="price"><?php echo $product->get_price_html(); ?></span>
<?php endif; ?>