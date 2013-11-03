<?php

	// DEFINE THEME DIRECTORY
	define("THEME_DIR", get_template_directory_uri());

	if ( ! isset( $content_width ) ) $content_width = 900;

	require("wpts/inc/_contact.php"); 
	
	require("wpts/wpts_admin_config.php"); require("wpts/admin/wpts_init_admin.php"); 
 
	require("wpts/wpts_shortcodes.php"); 

	require("wpts/layout-builder/layout-builder.php"); 
	
	// PORTFOLIO
	
	//require("wpts/inc/_portfolio.php"); 

	require("wpts/sliders/slider_functions.php"); 
	
	/*--- REMOVE GENERATOR META TAG ---*/
	remove_action('wp_head', 'wp_generator');
	
	/*--- SUPPORT TO LANGUAGES ---*/
	
	
	load_theme_textdomain( 'kinetico', TEMPLATEPATH.'/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH."/languages/$locale.php";
	if ( is_readable($locale_file) )
		require_once($locale_file);
	
	/*== VERIFY IF IS LOGIN PAGE ==*/
	
	function is_login_page() {
		return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
	}
	
	
	/*== ENQUEUE STYLES ==**/
	
	function enqueue_styles() {
		if(!is_admin() && !is_login_page()) :

			if(wpts_get_option("colors", "use_cyrillic"))
			{
				wp_register_style( 'viga-font', 'http://fonts.googleapis.com/css?family=Viga&subset=latin,latin-ext', array(), '1', 'all' );
				wp_enqueue_style( 'viga-font' );
			}

			wp_register_style( 'droid-font', 'http://fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700', array(), '1', 'all' );
			wp_enqueue_style( 'droid-font' );

			wp_register_style( 'base-style', THEME_DIR . '/css/base.css', array(), '1', 'all' );
			wp_enqueue_style( 'base-style' );
			
			wp_register_style( 'skeleton-style', THEME_DIR . '/css/skeleton.css', array(), '1', 'all' );
			wp_enqueue_style( 'skeleton-style' );
			
			wp_register_style( 'layout-style', THEME_DIR . '/css/layout.css', array(), '1', 'all' );
			wp_enqueue_style( 'layout-style' );
			
			wp_enqueue_style("main-style", get_stylesheet_directory_uri() ."/style.css", false, "1.0", "all");

		endif;
	}
	add_action( 'init', 'enqueue_styles' );
	
	/*== ENQUEUE SCRIPTS ==**/
	
	function enqueue_scripts() {
		if(!is_admin() && !is_login_page()) :
			wp_enqueue_script( 'jquery' );
			
			wp_register_script( 'html5-shim', 'http://html5shim.googlecode.com/svn/trunk/html5.js', array(), null, false );
			wp_enqueue_script( 'html5-shim' );

			wp_enqueue_script( 'jquery.form', get_template_directory_uri() . '/js/jquery.form.js', array('jquery'), NULL );

			wp_enqueue_script( 'jquery.mobilemenu', get_template_directory_uri() . '/js/jquery.mobilemenu.js', array('jquery'), NULL );
			wp_enqueue_script( 'mobile-menu-init', get_template_directory_uri() . '/js/mobile-menu-init.js', array('jquery'), NULL );
			
			wp_enqueue_script( 'init', get_template_directory_uri() . '/js/init.js', array('jquery'), NULL );

		endif;
	}
	add_action( 'init', 'enqueue_scripts' );

	/*== ENABLE CUSTOM MENUS ==**/
	if ( function_exists( 'register_nav_menu' ) ) {
	
		register_nav_menu( 'main_menu', 'Main Menu' );

		register_nav_menu( 'top_menu', 'Top Menu' );

	}

	add_post_type_support('page', 'excerpt');
	
	/*== SIDEBARS WIDGET AREAS ==**/
	
	register_sidebar( array(
		'id'          => 'right-sidebar',
		'name'        => 'Right Sidebar',
		'description' => 'Displayed at content\'s right on pages like: Blog, Single Post and Page with Sidebar.',
		'before_title'  => '<h3 class="widgettitle"><span>',
		'after_title'   => '</span></h3>',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>'
	) );

	register_sidebar( array(
		'id'          => 'woocommerce',
		'name'        => 'Woocommerce Sidebar',
		'description' => 'Displayed at content\'s right on pages like: Shop, Cart, Single Product and more.',
		'before_title'  => '<h3 class="widgettitle"><span>',
		'after_title'   => '</span></h3>',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>'
	) );
	
	register_sidebar( array(
		'id'          => 'footer-sidebar-1',
		'name'        => 'Footer Sidebar #1',
		'description' => 'Displayed at footer',
		'before_title'  => '<h3 class="widgettitle"><span>',
		'after_title'   => '</span></h3>',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>'
	) );

	register_sidebar( array(
		'id'          => 'footer-sidebar-2',
		'name'        => 'Footer Sidebar #2',
		'description' => 'Displayed at footer',
		'before_title'  => '<h3 class="widgettitle"><span>',
		'after_title'   => '</span></h3>',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>'
	) );

	register_sidebar( array(
		'id'          => 'footer-sidebar-3',
		'name'        => 'Footer Sidebar #3',
		'description' => 'Displayed at footer',
		'before_title'  => '<h3 class="widgettitle"><span>',
		'after_title'   => '</span></h3>',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>'
	) );

	register_sidebar( array(
		'id'          => 'footer-sidebar-4',
		'name'        => 'Footer Sidebar #4',
		'description' => 'Displayed at footer',
		'before_title'  => '<h3 class="widgettitle"><span>',
		'after_title'   => '</span></h3>',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>'
	) );

	require_once("wpts/sidebars/sidebars_init.php");

	add_filter('widget_text', 'do_shortcode');
	
	/**== BLOG POSTS ==**/
	
	if (function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
	}
	
	if ( function_exists( 'add_image_size' ) ) { 
		/* TEMPLATE - add_image_size( 'blog-size', 700, 290 );	*/

		add_image_size( 'blog-size', 621 );
		add_image_size( 'shop-size', 300, 220, true );
		add_image_size( 'single-shop-size', 621, 461, false );
	}
	
	/**== BREADCRUMBS ==**/
	
	function the_breadcrumbs() {
 
		$showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
		$delimiter = ''; // delimiter between crumbs
		$home = 'Home'; // text for the 'Home' link
		$showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
		$before = '<em class="active">'; // tag before the current crumb
		$after = '</em>'; // tag after the current crumb
		 
		global $post;
		$homeLink = get_bloginfo('url');
		 
		if (is_home() || is_front_page()) {
		 
			if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';
		 
		} else {
		 
			echo '<p id="breadcrumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
		 
			if ( is_category() ) {
			  global $wp_query;
			  $cat_obj = $wp_query->get_queried_object();
			  $thisCat = $cat_obj->term_id;
			  $thisCat = get_category($thisCat);
			  $parentCat = get_category($thisCat->parent);
			  if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
			  echo $before . __('Archive by category "', 'kinetico') . single_cat_title('', false) . '"' . $after;
		 
			} elseif ( is_day() ) {
			  echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
			  echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
			  echo $before . get_the_time('d') . $after;
		 
			} elseif ( is_month() ) {
			  echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
			  echo $before . get_the_time('F') . $after;
		 
			} elseif ( is_year() ) {
			  echo $before . get_the_time('Y') . $after;
		 
			} elseif ( is_single() && !is_attachment() ) {
			  if ( get_post_type() != 'post' ) {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
				if ($showCurrent == 1) echo $before . get_the_title() . $after;
			  } else {
				$cat = get_the_category(); $cat = $cat[0];
				echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
				if ($showCurrent == 1) echo $before . get_the_title() . $after;
			  }
		 
			} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			  $post_type = get_post_type_object(get_post_type());
			  echo $before . $post_type->labels->singular_name . $after;
		 
			} elseif ( is_attachment() ) {
			  $parent = get_post($post->post_parent);
			  $cat = get_the_category($parent->ID); $cat = $cat[0];
			  echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
			  echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
			  if ($showCurrent == 1) echo $before . get_the_title() . $after;
		 
			} elseif ( is_page() && !$post->post_parent ) {
			  if ($showCurrent == 1) echo $before . get_the_title() . $after;
		 
			} elseif ( is_page() && $post->post_parent ) {
			  $parent_id  = $post->post_parent;
			  $breadcrumbs = array();
			  while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
				$parent_id  = $page->post_parent;
			  }
			  $breadcrumbs = array_reverse($breadcrumbs);
			  foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
			  if ($showCurrent == 1) echo $before . get_the_title() . $after;
		 
			} elseif ( is_search() ) {
			  echo $before . __('Search results for "', 'kinetico') . get_search_query() . '"' . $after;
		 
			} elseif ( is_tag() ) {
			  echo $before .  __('Posts tagged "', 'kinetico') . single_tag_title('', false) . '"' . $after;
		 
			} elseif ( is_author() ) {
			   global $author;
			  $userdata = get_userdata($author);
			  echo $before .  __('Articles posted by ', 'kinetico') . $userdata->display_name . $after;
		 
			} elseif ( is_404() ) {
			  echo $before .  __('Error 404', 'kinetico') . $after;
			}

			echo '</p>';
		  }
	}
	
	/*== PAGINATION ==*/
	
	function nav_pagination($range = 2, $pages = '' )
	{  
		$showitems = ($range * 2)+1;  

		global $paged;
		if(empty($paged)) $paged = 1;

		if($pages == '')
		{
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if(!$pages)
			{
				$pages = 1;
			}
		}   

		if(1 != $pages)
		{
			echo '
			<div class="pagination">
				<div class="numbers">';

			for ($i=1; $i <= $pages; $i++)
			{
				if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
				{
					 echo ($paged == $i)? "<a class='active'>".$i."</a>":"<a href='".get_pagenum_link($i)."'>".$i."</a>";
				}
			}

			echo "
				</div> <!-- .numbers -->";

			echo '
				<div class="nav-buttons">';

					if ($paged <= $pages && $paged > 1) echo "<a href='".get_pagenum_link($paged - 1)."'>&lt;</a>";  
					if ($paged <= $pages-1) echo "<a href='".get_pagenum_link($paged + 1)."' class='next-button'>&gt;</a>";

			echo '
				</div> <!-- .nav_buttons -->';

			echo "	
			</div>\n";
		}
	}

	/*** WOOCOMMERCE ***/

	define('WOOCOMMERCE_USE_CSS', false);

	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
	add_action( 'kinetico_show_related', 'woocommerce_output_related_products', 20);


	// Redefine woocommerce_output_related_products()
	function woocommerce_output_related_products() {
		woocommerce_related_products(3,3); // Display 3 products in rows of 3
	}


	remove_action( 'woocommerce_after_single_product', 'woocommerce_upsell_display');
	add_action( 'kinetico_upsells', 'woocommerce_output_upsells', 20);

		if (!function_exists('woocommerce_output_upsells')) {
		function woocommerce_output_upsells() {
		woocommerce_upsell_display(3,3); // Display 3 products in rows of 3
		}
	}

	remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');

	add_action( 'woocommerce_cart_collaterals', 'woocommerce_output_cross');

		if (!function_exists('woocommerce_output_cross')) {
		function woocommerce_output_cross() {
		woocommerce_cross_sell_display(3,3); // Display 3 products in rows of 3
		}
	}

	add_filter('loop_shop_per_page', create_function('$cols', 'return '.wpts_get_option("ecommerce", "products_number").';'));

	/** SINGLE MODS **/
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);

	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 10);
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 20);

	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);


	add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);

	
	

	add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);


	/** AJAX ADD TO CART **/
	
	// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
	add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

	function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
	<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'kinetico'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'kinetico'), $woocommerce->cart->cart_contents_count);?></a>
	<?php

	$fragments['a.cart-contents'] = ob_get_clean();

	return $fragments;

	}

	require_once("woocommerce/woocommerce-template.php");

?>