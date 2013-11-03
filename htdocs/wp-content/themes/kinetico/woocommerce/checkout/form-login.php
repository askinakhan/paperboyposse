<?php
/**
 * Checkout Login Form
 */
if (is_user_logged_in()) return;

if (get_option('woocommerce_enable_signup_and_login_from_checkout')=="no") return;
?>
<div class="box-striped login-box">

	<div class="box-title">
	<?php
	$info_message = apply_filters('woocommerce_checkout_login_message', __('Already have an account?', 'kinetico'));
	?>
	</div>

	<h3><?php echo $info_message; ?></h3> <a href="#" class="button showlogin"><?php _e('Login to your Account', 'kinetico'); ?></a>
	
	<?php woocommerce_login_form( array( 'message' => __('If you have shopped with us before, please enter your username and password in the boxes below. If you are a new customer please proceed to the Billing &amp; Shipping section.', 'kinetico'), 'redirect' => get_permalink(woocommerce_get_page_id('checkout')) ) ); ?>

</div> <!-- .login-box -->