<?php
/**
 * Cart Page
 */
 
global $woocommerce;
?>

<?php $woocommerce->show_messages(); ?>

<form action="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" method="post">
<?php do_action( 'woocommerce_before_cart_table' ); ?>
<table class="shop_table cart" cellspacing="0">
	<thead>
		<tr>
			<th class="product-remove">&nbsp;</th>
			<th class="product-name"><span class="nobr"><?php _e('Item', 'kinetico'); ?></span></th>
			<th class="product-price"><span class="nobr"><?php _e('Unit Price', 'kinetico'); ?></span></th>
			<th class="product-quantity"><?php _e('Qty', 'kinetico'); ?></th>
			<th class="product-subtotal"><?php _e('Total', 'kinetico'); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php do_action( 'woocommerce_before_cart_contents' ); ?>
		
		<?php
		if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) {
			foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $values ) {
				$_product = $values['data'];
				if ( $_product->exists() && $values['quantity'] > 0 ) {
					?>
					<tr>
						<!-- Remove from cart link -->
						<td class="product-remove">
							<?php 
								echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s"><img src="'.THEME_DIR.'/images/delete.png" alt="X" /></a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), __('Remove this item', 'kinetico') ), $cart_item_key ); 
							?>
						</td>
						
						<!-- Product Name -->
						<td class="product-name">
							<?php 
								printf('<a href="%s">%s</a>', esc_url( get_permalink( apply_filters('woocommerce_in_cart_product_id', $values['product_id'] ) ) ), apply_filters('woocommerce_in_cart_product_title', $_product->get_title(), $_product) );
							
								// Meta data
								echo $woocommerce->cart->get_item_data( $values );
                   				
                   				// Backorder notification
                   				if ( $_product->backorders_require_notification() && $_product->get_total_stock() < 1 ) 
                   					echo '<p class="backorder_notification">' . __('Available on backorder.', 'kinetico') . '</p>';
							?>
						</td>
						
						<!-- Product price -->
						<td class="product-price">
							<?php 							
								$product_price = ( get_option('woocommerce_display_cart_prices_excluding_tax') == 'yes' ) ? $_product->get_price_excluding_tax() : $_product->get_price();
							
								echo apply_filters('woocommerce_cart_item_price_html', woocommerce_price( $product_price ), $values, $cart_item_key ); 
							?>
						</td>
						
						<!-- Quantity inputs -->
						<td class="product-quantity">
							<?php 
								if ( $_product->is_sold_individually() ) {
									$product_quantity = '1';
								} else {
									$data_min = apply_filters( 'woocommerce_cart_item_data_min', '', $_product );
									$data_max = ( $_product->backorders_allowed() ) ? '' : $_product->get_stock_quantity();
									$data_max = apply_filters( 'woocommerce_cart_item_data_max', $data_max, $_product ); 
									
									$product_quantity = sprintf( '<div class=""><input type="text" name="cart[%s][qty]" data-min="%s" data-max="%s" value="%s" size="4" title="Qty" class="input-text qty text" maxlength="12" /></div>', $cart_item_key, $data_min, $data_max, esc_attr( $values['quantity'] ) );
								}
								
								echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key ); 					
							?>
						</td>
						
						<!-- Product subtotal -->
						<td class="product-subtotal">
							<?php 
								echo $woocommerce->cart->get_product_subtotal( $_product, $values['quantity'] ); 
							?>
						</td>
					</tr>
					<?php
				}
			}
		}
		
		do_action( 'woocommerce_cart_contents' );
		?>
		
		<?php if ( get_option( 'woocommerce_enable_coupons' ) == 'yes' ) { ?>
		<tr>
			<td colspan="5" class="actions">
				<span class="actions-div">
					<div class="coupon">
					
						<h2><?php _e('Coupon', 'kinetico'); ?></h2> 
						<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" /> <input type="submit" class="button dark" name="apply_coupon" value="<?php _e('Apply Coupon', 'kinetico'); ?>" />
						
						<?php do_action('woocommerce_cart_coupon'); ?>
						
					</div>

				<?php $woocommerce->nonce_field('cart') ?>
					<span class="update-cart">
						<input type="submit" class="button dark" name="update_cart" value="<?php _e('Update Cart', 'kinetico'); ?>" />
					</span> 
				</span>
			</td>
		</tr>
		<?php } ?>
		
		<?php do_action( 'woocommerce_after_cart_contents' ); ?>
	</tbody>
</table>
<?php do_action( 'woocommerce_after_cart_table' ); ?>
</form>
<div class="cart-collaterals">
	
	<?php do_action('woocommerce_cart_collaterals'); ?>

	<?php woocommerce_shipping_calculator(); ?>
	
	<?php woocommerce_cart_totals(); ?>

	<div class="clear clearboth"></div>
	
</div>

<div class="go-checkout">
	<a href="<?php echo esc_url( $woocommerce->cart->get_checkout_url() ); ?>" class="checkout-button button alt"><?php _e('Proceed to Checkout', 'kinetico'); ?></a>
	<?php do_action('woocommerce_proceed_to_checkout'); ?>
</div> <!-- .go-checkout -->