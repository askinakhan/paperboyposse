<?php
/**
 * External Add to Cart
 */
?>
<?php do_action('woocommerce_before_add_to_cart_button'); ?>

<div class="price-wrapper-external">
<p class="cart"><a href="<?php echo $product_url; ?>" rel="nofollow" class="button alt"><?php echo apply_filters('single_add_to_cart_text', $button_text, 'external'); ?></a></p>
<div class="clear clearboth"></div>
</div>

<?php do_action('woocommerce_after_add_to_cart_button'); ?>