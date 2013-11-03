<?php
/**
 * Single Product Price
 */

global $post, $product;
?>
<div class="price-wrapper">
	<p itemprop="price" class="price"><?php echo $product->get_price_html(); ?></p>
</div>