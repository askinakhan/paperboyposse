<?php
/**
 * Empty Cart Page
 */
?>

<div class="woocommerce_message">
<?php _e('Your cart is currently empty.', 'kinetico') ?>

<?php do_action('woocommerce_cart_is_empty'); ?>

<a class="button" href="<?php echo get_permalink(woocommerce_get_page_id('shop')); ?>"><?php _e('&larr; Return To Shop', 'kinetico') ?></a>
</div>