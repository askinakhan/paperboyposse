<?php
/**
 * WordPress Toolset 2.0 Shortcodes - Add custom shortcodes here
 *
 */
 
/*-----------------------------------------------------------------------------------*/
/* Enqueue Scripts
/*-----------------------------------------------------------------------------------*/

function wpts_custom_enqueue_scripts() {

	//wp_enqueue_script( "script-id", get_template_directory_uri() . "/url-script", array(''), NULL, false );
}
add_action( 'init', 'wpts_custom_enqueue_scripts' );

/*-----------------------------------------------------------------------------------*/
/* Enqueue the styles used by ShortCodes
/*-----------------------------------------------------------------------------------*/

function wpts_custom_enqueue_styles() {

	/*wp_register_style( 'style-id', get_template_directory_uri() . '/style-address', array(), '1', 'all' );
	wp_enqueue_style( 'style-id' );*/
}
add_action( 'init', 'wpts_custom_enqueue_styles' );

/*-----------------------------------------------------------------------------------*/
/* Shortcode Template
/*-----------------------------------------------------------------------------------*/

/*function wpts_attr($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'attr' => '',
	), $atts));

	return '';
}
add_shortcode('attr', 'wpts_attr');*/

/*-----------------------------------------------------------------------------------*/
/* [blockquote]
/*-----------------------------------------------------------------------------------*/

function wpts_blockquote($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'attr' => '',
	), $atts));

	return '<div class="blockquote"><blockquote>'.do_shortcode($content).'</blockquote></div>';
}
add_shortcode('blockquote', 'wpts_blockquote');

/*-----------------------------------------------------------------------------------*/
/* [callout]
/*-----------------------------------------------------------------------------------*/

function wpts_callout($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'button' => '',
		'href' => '',
	), $atts));

	$class = '';
	$btn = '';

	if($button != '')
	{
		$class = 'with-button';
		$btn = '
		<div class="action">
			<a class="button default" href="'.$href.'">'.$button.'</a>
		</div> <!-- .action -->
		';
	}

	return '[raw]
	<div class="callout '.$class.'">
		<h2>'.trim($content).'</h2>
		'.$btn.'
	</div> <!-- .callout -->
	[/raw]';
}
add_shortcode('callout', 'wpts_callout');

/*-----------------------------------------------------------------------------------*/
/* [latest_posts]
/*-----------------------------------------------------------------------------------*/

function wpts_latest_posts($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'num' => '',
	), $atts));

	return '';
}
add_shortcode('latest_posts', 'wpts_latest_posts');

/*-----------------------------------------------------------------------------------*/
/* [image]
/*-----------------------------------------------------------------------------------*/

function wpts_image($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'src' => '',
		'width' => '',
		'height' => '',
		'padding' => '0',
		'align' => ''
	), $atts));
				
	$styles = '';
	$class = '';
	
	if($align != '' && $align != 'center') { $align = ' float: '.$align.';'; }
	
	if($align == 'center') { $class = 'align-center'; $align = ''; }
		
	return '<img src="'.$src.'" alt=" " width="'.$width.'" height="'.$height.'" class="image-shortcode '.$class.'" style="padding: '.$padding.';'.$align.'" />';
}

add_shortcode('image', 'wpts_image');

/*-----------------------------------------------------------------------------------*/
/* [button]
/*-----------------------------------------------------------------------------------*/

function wpts_button($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'href' => '',
		'target' => '',
		'color' => 'default',
	), $atts));

	if($target != "")
		$target = 'target="'.$taget.'"';

	return '<a href="'.$href.'" '.$target.' class="button '.$color.'">'.trim($content).'</a>';
}
add_shortcode('button', 'wpts_button');

/*-----------------------------------------------------------------------------------*/
/* [alert]
/*-----------------------------------------------------------------------------------*/

function wpts_alert($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'attr' => '',
	), $atts));

	return '<div class="alert">'.do_shortcode($content).'</div>';
}
add_shortcode('alert', 'wpts_alert');

/*-----------------------------------------------------------------------------------*/
/* [success]
/*-----------------------------------------------------------------------------------*/

function wpts_success($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'attr' => '',
	), $atts));

	return '<div class="success">'.do_shortcode($content).'</div>';
}
add_shortcode('success', 'wpts_success');

/*-----------------------------------------------------------------------------------*/
/* [message]
/*-----------------------------------------------------------------------------------*/

function wpts_message($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'attr' => '',
	), $atts));

	return '<div class="message">'.do_shortcode($content).'</div>';
}
add_shortcode('message', 'wpts_message');

/*-----------------------------------------------------------------------------------*/
/* [icon]
/*-----------------------------------------------------------------------------------*/

function wpts_icon($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'media' => 'twitter',
		'href' => '#',
	), $atts));

	return '<a href="'.$href.'" target="_blank" class="social-icon"><img src="'.THEME_DIR.'/images/social/'.$media.'.png" alt=" " /></a>';
}
add_shortcode('icon', 'wpts_icon');


/*-----------------------------------------------------------------------------------*/
/* [flex_slider] Display a Flex Slider
/*-----------------------------------------------------------------------------------*/

	function wpts_flex_slider($atts, $content = null, $code) 
	{
		wp_enqueue_script( 'flex-slider');
		
		extract(shortcode_atts( array(
			'id' => '',
			'arrow' => 'false',
		), $atts));
		
		$html = '[raw]
		<div class="flex-container">
			<div class="flexslider" id="'.$id.'">
				<ul class="slides">'.do_shortcode($content).'
				</ul>
			</div>
		</div>
		<script type="text/javascript" charset="utf-8">
		  jQuery(window).load(function() {
			jQuery(\'.flexslider\').flexslider({
				  animation: "slide",
				  controlsContainer: ".flex-container",
				  directionNav: '.$arrow.'
			});
		  });
		</script>
		
		[/raw]';

		return $html;
	}

	add_shortcode('flex_slider','wpts_flex_slider');
	
/*-----------------------------------------------------------------------------------*/
/* [flex_slider_item] Display a Flex Slider
/*-----------------------------------------------------------------------------------*/
function wpts_flex_slider_item($atts, $content = null, $code) 
	{
		extract(shortcode_atts( array(
			'src' => '',
			'caption' => '',
			'href' => '',
		), $atts));
		
		if($caption != '')
		{
			$caption = '<p class="flex-caption">'.$caption.'</p>';
		}
		
		$hclose = '';
		
		if($href!= '')
		{
			$href = '<a href="'.$href.'">';
			$hclose = '</a>';
		}

		if($src != '') 
		{
			$src = '<img src="'.$src.'" />';
		}
		
		$html = ' 
		<li>
			'.$href.$src.$hclose.'
			'.$caption.'
			'.do_shortcode($content).'
		</li>';
		
		return $html;

	}
	
	add_shortcode('flex_item', 'wpts_flex_slider_item');

/*-----------------------------------------------------------------------------------*/
/* [frame]
/*-----------------------------------------------------------------------------------*/

function wpts_frame($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'image' => '',
		'title' => '',
		'sub' => ''
	), $atts));

	if($sub != '')
		$sub = '<p>'.$sub.'</p>';

	return '[raw]
	<div class="frame">
		<div class="image">
			<img src="'.$image.'" alt="'.$title.'" />
		</div>
		<div class="meta">
			<h5>'.$title.'</h5>
			'.$sub.'
		</div>
	</div>
	[/raw]';
}
add_shortcode('frame', 'wpts_frame');

/*-----------------------------------------------------------------------------------*/
/* [contact_form]
/*-----------------------------------------------------------------------------------*/

function wpts_contact_form($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'attr' => '',
	), $atts));

	return '
		<div class="contact">
			<div class="form">
			<form id="myForm" method="post" action="'.THEME_DIR.'/contact.php">
				<input type="text" value="'.__("Name", "kinetico").'" id="name" name="name" class="fields" onfocus="if(this.value == \''.__("Name", "kinetico").'\') {this.value = \'\';}" onblur="if (this.value == \'\') {this.value = \''.__("Name", "kinetico").'\';}"><br/>
				<input type="text" value="'.__("Email", "kinetico").'" id="email" name="email" class="fields" onfocus="if(this.value == \''.__("Email", "kinetico").'\') {this.value = \'\';}" onblur="if (this.value == \'\') {this.value = \''.__("Email", "kinetico").'\';}"><br/>
				<textarea cols="20" rows="5" id="message" name="message" class="fields" onfocus="if(this.value == \''.__("Your comments...", "kinetico").'\') {this.value = \'\';}" onblur="if (this.value == \'\') {this.value = \''.__("Your comments...", "kinetico").'\';}">'.__("Your comments...", "kinetico").'</textarea><br/>
				<button type="submit" id="submit" name="submit" class="button default small"><span>'.__("Send Message", "kinetico").'</span></button>
				<div id="ajax_loader" class="loader_message"></div><div id="loader_icon" class="loader_icon"></div>
			</form>
			</div>
		</div>

		<script type="text/javascript">
			jQuery(document).ready(function($) {
				var formOpt = { beforeSubmit:showLoader, success:checkStatus };
				jQuery("#myForm").ajaxForm(formOpt);

				function showLoader(){
					jQuery("#loader_icon").fadeIn("slow");
				};
						 
				function checkStatus(status){
					jQuery("#loader_icon").fadeOut("slow");
					document.getElementById("ajax_loader").innerHTML = status;
				};
			});
		</script>';
}
add_shortcode('contact_form', 'wpts_contact_form');

?>