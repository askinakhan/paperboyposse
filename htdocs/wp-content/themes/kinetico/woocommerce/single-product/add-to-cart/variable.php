<?php
/**
 * Variable Product Add to Cart
 */
 
global $woocommerce, $product, $post;
?>
<script type="text/javascript">
    var product_variations = <?php echo json_encode($available_variations) ?>;
</script>

<?php do_action('woocommerce_before_add_to_cart_form'); ?>

<form action="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="variations_form cart" method="post" enctype='multipart/form-data'>
	<div class="variations-table">
	<table class="variations" cellspacing="0">
		<tbody>
			<?php $loop = 0; foreach ($attributes as $name => $options) : $loop++; ?>
				<tr>
					<!-- <td><label for="<?php echo sanitize_title($name); ?>"><?php echo $woocommerce->attribute_label($name); ?></label></td> -->
					<td class="label"><label for="<?php echo sanitize_title($name); ?>"><?php echo $woocommerce->attribute_label($name); ?></label></td>
					<!-- <td><select id="<?php echo esc_attr( sanitize_title($name) ); ?>" name="attribute_<?php echo sanitize_title($name); ?>"> -->
					<td class="value"><select id="<?php echo esc_attr( sanitize_title($name) ); ?>" name="attribute_<?php echo sanitize_title($name); ?>">
						<option value=""><?php echo __('Choose an option', 'kinetico') ?>&hellip;</option>
						<?php if(is_array($options)) : ?>
							<?php
								$selected_value = (isset($selected_attributes[sanitize_title($name)])) ? $selected_attributes[sanitize_title($name)] : '';
								// Get terms if this is a taxonomy - ordered
								if (taxonomy_exists(sanitize_title($name))) :
									$args = array('menu_order' => 'ASC');
									$terms = get_terms( sanitize_title($name), $args );
	
									foreach ($terms as $term) :
										if (!in_array($term->slug, $options)) continue;
										echo '<option value="'.$term->slug.'" '.selected($selected_value, $term->slug).'>'.$term->name.'</option>';
									endforeach;
								else :
									foreach ($options as $option) :
										echo '<option value="'.$option.'" '.selected($selected_value, $option).'>'.$option.'</option>';
									endforeach;
								endif;
							?>
						<?php endif;?>
					</select> <?php
						if ( sizeof($attributes) == $loop ) {
							echo '<a class="reset_variations" href="#reset">'.__('Clear selection', 'kinetico').'</a>';
						}
					?></td>
				</tr>
	        <?php endforeach;?>
		</tbody>
	</table>
	</div>

	<?php do_action('woocommerce_before_add_to_cart_button'); ?>

	<div class="single_variation_wrap" style="display:block;">

		<?php
		if( $product->min_variation_price === $product->max_variation_price ) : ?>
			<span class="price"><?php echo $product->get_price_html(); ?></span>
		<?php endif; ?>

		<div class="single_variation"></div>
		<div class="variations_button">
			<input type="hidden" name="variation_id" value="" />
			<?php woocommerce_quantity_input(); ?>
			<button type="submit" class="button alt"><?php echo apply_filters('single_add_to_cart_text', __('Add to cart', 'kinetico'), $product->product_type); ?></button>
		</div>
	</div>
	<div><input type="hidden" name="product_id" value="<?php echo esc_attr( $post->ID ); ?>" /></div>

	<?php do_action('woocommerce_after_add_to_cart_button'); ?>

</form>

<?php do_action('woocommerce_after_add_to_cart_form'); ?>
