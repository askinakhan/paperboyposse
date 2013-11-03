<?php
global $woocommerce;
?>
<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>

	<!--=== META TAGS ===-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="description" content="Keywords">
	<meta name="author" content="Name">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<?php
    $favicon =  THEME_DIR .'/images/favicon.ico';
    if(wpts_get_option("general", "favicon_url") != "")
        $favicon = wpts_get_option("general", "favicon_url");
	?>

	<!--=== LINK TAGS ===-->
	<link rel="shortcut icon" href="<?php echo $favicon; ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS2 Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

	<!--=== TITLE ===-->
	<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '-', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " - $site_description";

	?></title>
	
	<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Francois+One&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	
	<!--=== WP_HEAD() ===-->
	<?php wp_head(); ?>

	<?php if(wpts_get_option("general", "css_custom") != '') : ?>

		<style type="text/css">
			<?php echo wpts_get_option("general", "css_custom"); ?>
		</style>

	<?php endif; ?>

</head>
<body <?php body_class(); ?>>

	<div class="mega-container" id="wrapper">
	
	<div class="background">
		
		<div id="top" class="padding omega">
			<?php if(method_exists($woocommerce->cart, 'get_cart_url')) : ?>
			<div class="cart-status">
				<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'kinetico'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'kinetico'), $woocommerce->cart->cart_contents_count);?></a>
			</div>
			<?php endif; ?>
			<div class="top-menu">
				<?php wp_nav_menu( array( 'theme_location' => 'top_menu', 'container' => '', 'items_wrap' => '<ul>%3$s</ul>') ); ?>
			</div> <!-- .top-menu -->
			
			<div class="clearfix"></div>
		</div> <!-- #top -->
		
		<div id="header" class="padding">
			<div class="logo">
				<?php
			    $logo =  THEME_DIR .'/images/logo.png';
			    if(wpts_get_option("general", "logo_url") != "")
			        $logo = wpts_get_option("general", "logo_url");
				?>
				<a href="<?php echo home_url("/"); ?>"><img src="<?php echo $logo; ?>" alt="<?php bloginfo('name'); ?>" /></a>
			</div> <!-- .logo -->
			<nav class="main-menu">
				<?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'container' => '', 'items_wrap' => '<ul>%3$s</ul>') ); ?> 
			</nav>
			<div class="clearfix"></div>
		</div> <!-- #header -->
