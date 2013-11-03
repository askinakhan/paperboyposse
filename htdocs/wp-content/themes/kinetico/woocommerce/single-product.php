<?php get_header('shop'); ?>

<?php
	wp_enqueue_script( 'flex-slider');
	wp_enqueue_style( 'flex-slider-css');
?>
	  
<?php do_action('woocommerce_before_main_content'); ?>

<?php custom_woocommerce_single_product_content(); ?>

<?php do_action('woocommerce_sidebar'); ?>

<div class="clear clearboth"></div>

<?php do_action('woocommerce_after_main_content'); ?>

<div class="clear clearboth"></div>

<?php do_action('kinetico_upsells'); ?>

<div class="clear clearboth"></div>

<?php do_action('kinetico_show_related'); ?>

<?php get_footer('shop'); ?>