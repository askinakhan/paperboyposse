<?php

if ( ! function_exists( 'custom_woocommerce_archive_product_content' ) ) {
	function custom_woocommerce_archive_product_content() {

		if ( ! is_search() ) {
			$shop_page = get_post( woocommerce_get_page_id( 'shop' ) );
			$shop_page_title = apply_filters( 'the_title', ( get_option( 'woocommerce_shop_page_title' ) ) ? get_option( 'woocommerce_shop_page_title' ) : $shop_page->post_title );
			if ( is_object( $shop_page  ) )
				$shop_page_content = $shop_page->post_content;
		} else {
			$shop_page_title = __( 'Search Results:', 'kinetico' ) . ' &ldquo;' . get_search_query() . '&rdquo;';
			if ( get_query_var( 'paged' ) ) $shop_page_title .= ' &mdash; ' . __( 'Page', 'kinetico' ) . ' ' . get_query_var( 'paged' );
			$shop_page_content = '';
		}

		?>
		<div class="big-header min-padding">
			<h1><?php echo $shop_page_title ?></h1> <p><?php if(wpts_get_option("ecommerce", "shop_desc") != '') echo stripslashes(wpts_get_option("ecommerce", "shop_desc")); ?></p>
		</div>

		<?php if ( ! empty( $shop_page_content  ) ) echo apply_filters( 'the_content', $shop_page_content ); ?>

		<div class="top-shop">

			<div class="categories">

			<?php
				$cat_args = array('show_count' => false, 'hierarchical' => false, 'taxonomy' => 'product_cat');

				global $wp_query, $post, $woocommerce;
			
				$current_cat = false;
				$cat_ancestors = array();
					
				if ( is_tax('product_cat') ) :
				
					$current_cat = $wp_query->queried_object;
					$cat_ancestors = get_ancestors( $current_cat->term_id, 'product_cat' );
				
				elseif ( is_singular('product') ) :
					
					$product_category = wp_get_post_terms( $post->ID, 'product_cat' ); 
					
					if ($product_category) :
						$current_cat = end($product_category);
						$cat_ancestors = get_ancestors( $current_cat->term_id, 'product_cat' );
					endif;
					
				endif;
				
				include_once( $woocommerce->plugin_path() . '/classes/walkers/class-product-cat-list-walker.php' );
				
				$cat_args['walker'] 			= new WC_Product_Cat_List_Walker;
				$cat_args['title_li'] 			= '';
				$cat_args['show_children_only']	= ( isset( $instance['show_children_only'] ) && $instance['show_children_only'] ) ? 1 : 0;
				$cat_args['pad_counts'] 		= 1;
				$cat_args['show_option_none'] 	= __('No product categories exist.', 'kinetico');
				$cat_args['current_category']	= ( $current_cat ) ? $current_cat->term_id : '';
				$cat_args['current_category_ancestors']	= $cat_ancestors;

				echo '<a href="#" class="product-drop">'.__("View Categories", "kinetico").'</a>';
				
				echo '<ul class="product-categories">';
				
				wp_list_categories( apply_filters( 'woocommerce_product_categories_widget_args', $cat_args ) );
				
				echo '</ul>';
			?>
			</div> <!-- .categories -->

			<div class="shop-search">

				<form role="search" method="get" id="searchform" action="<?php echo home_url("/"); ?>" >
					<div class="newsletter_input search_input">
				    <input type="text" id="s" onClick="if(this.value=='<?php _e("Type and Press Enter", "kinetico"); ?>'){this.value='';}" onblur="if(this.value==''){this.value='<?php _e("Type and Press Enter", "kinetico"); ?>';}" value="" name="s">
					<input type="hidden" value="product" name="post_type" />
					<script type="text/javascript">
						jQuery(document).ready(function() {
							var query = jQuery(".search_input #s").val();
							if(query == "")
							{
								jQuery(".search_input #s").val("<?php _e("Type and Press Enter", "kinetico"); ?>");
							}
						});
					</script>
					</div>
				</form>

			</div> <!-- .shop-search -->

			<div class="clear"></div>
		</div>


		<?php woocommerce_get_template_part( 'loop', 'shop'  ); ?>

		<?php do_action( 'woocommerce_pagination' );

	}
}
if ( ! function_exists( 'custom_woocommerce_product_taxonomy_content' ) ) {
	function custom_woocommerce_product_taxonomy_content() {

		global $wp_query;

		$term = get_term_by( 'slug', get_query_var( $wp_query->query_vars['taxonomy'] ) , $wp_query->query_vars['taxonomy'] );

		?>

		<div class="big-header min-padding">
			<h1><?php echo wptexturize( $term->name ); ?></h1> <?php if ( $term->description ) : ?> <p><?php echo wpautop( wptexturize( $term->description ) ); ?></p><?php endif; ?>
		</div>

		<div class="top-shop">

			<div class="categories">

			<?php
				$cat_args = array('show_count' => false, 'hierarchical' => false, 'taxonomy' => 'product_cat');

				global $wp_query, $post, $woocommerce;
			
				$current_cat = false;
				$cat_ancestors = array();
					
				if ( is_tax('product_cat') ) :
				
					$current_cat = $wp_query->queried_object;
					$cat_ancestors = get_ancestors( $current_cat->term_id, 'product_cat' );
				
				elseif ( is_singular('product') ) :
					
					$product_category = wp_get_post_terms( $post->ID, 'product_cat' ); 
					
					if ($product_category) :
						$current_cat = end($product_category);
						$cat_ancestors = get_ancestors( $current_cat->term_id, 'product_cat' );
					endif;
					
				endif;
				
				include_once( $woocommerce->plugin_path() . '/classes/walkers/class-product-cat-list-walker.php' );
				
				$cat_args['walker'] 			= new WC_Product_Cat_List_Walker;
				$cat_args['title_li'] 			= '';
				$cat_args['show_children_only']	= ( isset( $instance['show_children_only'] ) && $instance['show_children_only'] ) ? 1 : 0;
				$cat_args['pad_counts'] 		= 1;
				$cat_args['show_option_none'] 	= __('No product categories exist.', 'kinetico');
				$cat_args['current_category']	= ( $current_cat ) ? $current_cat->term_id : '';
				$cat_args['current_category_ancestors']	= $cat_ancestors;

				echo '<a href="#" class="product-drop">'.__("View Categories", "kinetico").'</a>';
				
				echo '<ul class="product-categories">';
				
				wp_list_categories( apply_filters( 'woocommerce_product_categories_widget_args', $cat_args ) );
				
				echo '</ul>';
			?>
			</div> <!-- .categories -->

			<div class="shop-search">

				<form role="search" method="get" id="searchform" action="<?php echo home_url("/"); ?>" >
					<div class="newsletter_input search_input">
				    <input type="text" id="s" onClick="if(this.value=='<?php _e("Type and Press Enter", "kinetico"); ?>'){this.value='';}" onblur="if(this.value==''){this.value='<?php _e("Type and Press Enter", "kinetico"); ?>';}" value="" name="s">
					<input type="hidden" value="product" name="post_type" />
					<script type="text/javascript">
						jQuery(document).ready(function() {
							var query = jQuery(".search_input #s").val();
							if(query == "")
							{
								jQuery(".search_input #s").val("<?php _e("Type and Press Enter", "kinetico"); ?>");
							}
						});
					</script>
					</div>
				</form>

			</div> <!-- .shop-search -->

			<div class="clear"></div>
		</div>

		<?php woocommerce_get_template_part( 'loop', 'shop'  ); ?>

		<?php do_action( 'woocommerce_pagination' );

	}
}
if ( ! function_exists( 'custom_woocommerce_single_product_content' ) ) {
	function custom_woocommerce_single_product_content( $wc_query = false  ) {

		// Let developers override the query used, in case they want to use this function for their own loop/wp_query
		if ( ! $wc_query ) {
			global $wp_query;

			$wc_query = $wp_query;
		}

		$shop_page = get_post( woocommerce_get_page_id( 'shop' ) );
		$shop_page_title = apply_filters( 'the_title', ( get_option( 'woocommerce_shop_page_title' ) ) ? get_option( 'woocommerce_shop_page_title' ) : $shop_page->post_title );

		?>

		<div class="big-header min-padding">
			<h1><?php echo $shop_page_title ?></h1>  <p><?php if(wpts_get_option("ecommerce", "shop_desc") != '') echo stripslashes(wpts_get_option("ecommerce", "shop_desc")); ?></p>
		</div>

		<?php
		if ( $wc_query->have_posts() ) while ( $wc_query->have_posts() ) : $wc_query->the_post(); ?>

			<?php do_action( 'woocommerce_before_single_product' ); ?>

			<div itemscope itemtype="http://schema.org/Product" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php do_action( 'woocommerce_before_single_product_summary' ); ?>

				<div class="summary" itemprop="offers" itemscope itemtype="http://schema.org/Offer">

					<?php do_action( 'woocommerce_single_product_summary' ); ?>

				</div>
	
				<?php do_action( 'woocommerce_after_single_product_summary' ); ?>
				
			</div>

			<?php do_action( 'woocommerce_after_single_product'  ); ?>

		<?php endwhile;

	}
}
