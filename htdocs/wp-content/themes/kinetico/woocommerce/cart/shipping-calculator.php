<?php
/**
 * Shipping Calculator
 */
 
global $woocommerce;

if ( get_option('woocommerce_enable_shipping_calc')=='no' || ! $woocommerce->cart->needs_shipping() ) return;
?>

<?php do_action( 'woocommerce_before_shipping_calculator' ); ?>

<div class="shipping-area">
	<div class="shipping-content">
	<form class="shipping_calculator" action="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" method="post">
		<section class="custom-shipping-calculator-form">
			<h2><?php _e("Calculate Shipping", "kinetico"); ?></h2>
			<p class="form-row form-row-first">
				<select name="calc_shipping_country" id="calc_shipping_country" class="country_to_state" rel="calc_shipping_state">
					<option value=""><?php _e('Select a country&hellip;', 'kinetico'); ?></option>
					<?php
						foreach($woocommerce->countries->get_allowed_countries() as $key=>$value) :
							echo '<option value="'.$key.'"';
							if ($woocommerce->customer->get_shipping_country()==$key) echo 'selected="selected"';
							echo '>'.$value.'</option>';
						endforeach;
					?>
				</select>
			</p>
			<p class="form-row form-row-last">
				<?php
					$current_cc = $woocommerce->customer->get_shipping_country();
					$current_r = $woocommerce->customer->get_shipping_state();
					$states = $woocommerce->countries->states;
		
					if (isset( $states[$current_cc][$current_r] )) :
						// Dropdown
						?>
						<span>
							<select name="calc_shipping_state" id="calc_shipping_state"><option value=""><?php _e('Select a state&hellip;', 'kinetico'); ?></option><?php
								foreach($states[$current_cc] as $key=>$value) :
									echo '<option value="'.$key.'"';
									if ($current_r==$key) echo 'selected="selected"';
									echo '>'.$value.'</option>';
								endforeach;
							?></select>
						</span>
						<?php
					else :
						// Input
						?>
						<input type="text" class="input-text" value="<?php echo esc_attr( $current_r ); ?>" placeholder="<?php _e('State', 'kinetico'); ?>" name="calc_shipping_state" id="calc_shipping_state" />
						<?php
					endif;
				?>
			</p>
			<div class="clear"></div>
			<p class="form-row form-row-wide">
				<input type="text" class="input-text" value="<?php echo esc_attr( $woocommerce->customer->get_shipping_postcode() ); ?>" placeholder="<?php _e('Postcode/Zip', 'kinetico'); ?>" title="<?php _e('Postcode', 'kinetico'); ?>" name="calc_shipping_postcode" id="calc_shipping_postcode" />
			</p>
			<div class="clear"></div>
			<p class="submit-shipping"><button type="submit" name="calc_shipping" value="1" class="button dark"><?php _e('Update Totals', 'kinetico'); ?></button></p>
			<?php $woocommerce->nonce_field('cart') ?>
			<div class="clear clearboth"></div>
		</section>
	</form>
	</div>
</div>

<?php do_action( 'woocommerce_after_shipping_calculator' ); ?>
