<?php
/**
 * WordPress Toolset 2.0 Shortcodes
 *
 */
 
 function wpts_addvar() {
	echo '<script type="text/javascript">var THEME_DIR = "'.get_template_directory_uri().'";</script>';
 }
 
 add_action( 'wp_print_scripts', 'wpts_addvar' );

/*-----------------------------------------------------------------------------------*/
/* Enqueue Scripts
/*-----------------------------------------------------------------------------------*/

function wpts_enqueue_scripts() {

	$key = '';
	
	wp_enqueue_script( 'jquery' );

	wp_register_script( 'jquery-tabs', get_template_directory_uri() . '/wpts/shortcodes/assets/js/jquery.tools.tabs.min.js', array( 'jquery' ), '1.2.5', true );
		
	wp_register_script( 'jquery-tabs-init', get_template_directory_uri() . '/wpts/shortcodes/assets/js/tabs-init.js', array( 'jquery-tabs' ), '1', true );
			
	wp_register_script( 'jquery-mosaic', get_template_directory_uri() . '/wpts/shortcodes/assets/js/mosaic.1.0.1.min.js', array( 'jquery' ), '1.0.1', true );
		
	wp_register_script( 'jquery-mosaic-init', get_template_directory_uri() . '/wpts/shortcodes/assets/js/mosaic-init.js', array( 'jquery-mosaic' ), '1', true );
	
	wp_register_script( 'pin-init', get_template_directory_uri() . '/wpts/shortcodes/assets/js/pin-init.js', array(), '1', true );
	
	wp_register_script( 'tweet-api', get_template_directory_uri() . '/wpts/shortcodes/assets/js/tweet-api.js', array(), '1', true );
		
	wp_register_script( 'jquery-tweet', get_template_directory_uri() . '/wpts/shortcodes/assets/js/jquery.tweet.js', array(), '1', false );
		
	wp_register_script( 'jquery-boxes', get_template_directory_uri() . '/wpts/shortcodes/assets/js/boxes-init.js', array('jquery'), '1', true );
		
	wp_register_script( 'jquery-tooltip', get_template_directory_uri() . '/wpts/shortcodes/assets/js/jquery.tipTip.minified.js', array('jquery'), '1.3', false );
		
	wp_register_script( 'jquery-tool-init', get_template_directory_uri() . '/wpts/shortcodes/assets/js/tooltip-init.js', array('jquery'), '1', true );

	wp_enqueue_script( 'gmap-api', "http://maps.googleapis.com/maps/api/js?sensor=true", array('jquery'), NULL );
	
	wp_enqueue_script( 'jquery-pretty', get_template_directory_uri() . '/wpts/shortcodes/assets/prettyphoto/js/jquery.prettyPhoto.js', array('jquery'), NULL );
	
	wp_enqueue_script( 'jquery-pretty-init', get_template_directory_uri() . '/wpts/shortcodes/assets/prettyphoto/init.js', array('jquery'), NULL );
	
	wp_register_script( 'flex-slider', get_template_directory_uri() . '/wpts/shortcodes/assets/flexslider/jquery.flexslider-min.js', array('jquery'), NULL );
	
}
add_action( 'init', 'wpts_enqueue_scripts' );

/*-----------------------------------------------------------------------------------*/
/* Enqueue the styles used by ShortCodes
/*-----------------------------------------------------------------------------------*/

function wpts_enqueue_styles() {
	/** REGISTER assets/css/shortcodes.css **/
	wp_register_style( 'shortcodes-style', get_template_directory_uri() . '/wpts/shortcodes/assets/css/shortcodes.css', array(), '1', 'all' );
	wp_enqueue_style( 'shortcodes-style' );
	
	wp_register_style( 'flex-slider-css', get_template_directory_uri() . '/wpts/shortcodes/assets/flexslider/flexslider.css', array(), NULL, 'all' );
	wp_enqueue_style( 'flex-slider-css');
		
	wp_register_style( 'pretty-style', get_template_directory_uri() . '/wpts/shortcodes/assets/prettyphoto/css/prettyPhoto.css', array(), '1', 'all' );
	
	wp_enqueue_style( 'pretty-style' );
}
add_action( 'init', 'wpts_enqueue_styles' );

/*-----------------------------------------------------------------------------------*/
/* WP Auto Formatting Fix w/Raw shortocde
/*-----------------------------------------------------------------------------------*/

if( ! function_exists( 'wpts_content_formatter' ) ) {
	function wpts_content_formatter( $content ) {
		$new_content = '';
		$pattern_full = '{(\[raw\].*?\[/raw\])}is';
		$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
		$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);
		foreach ($pieces as $piece) {
			if (preg_match($pattern_contents, $piece, $matches)) {
				$new_content .= $matches[1];
			} else {
				$new_content .= shortcode_unautop( wptexturize( wpautop( $piece ) ) );
			}
		}
		return $new_content;
	}
}
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_content', 'wptexturize' );
remove_filter( 'the_content', 'shortcode_unautop' );
add_filter( 'the_content', 'wpts_content_formatter', 99 );

/*-----------------------------------------------------------------------------------*/
/* [p] [div] [br] Markup Shortcodes
/*-----------------------------------------------------------------------------------*/

function wpts_div($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'id' => '',
		'class' => '',
	), $atts));
		
	if($id != '') { $id = ' id="'.$id.'"'; }
	if($class!= '') { $class = ' class="'.$class.'"'; }

		
	return '<div '.$id.$class.'>' .do_shortcode($content). '</div>';
}
add_shortcode('div', 'wpts_div');
	
function wpts_p($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'id' => '',
		'class' => '',
		'align' => '',
	), $atts));
		
	if($id != '') { $id = ' id="'.$id.'"'; }
	if($align!= '') { $align = ' align-'.$align; }
	
	return '<p '.$id.' class="'.$class.$align.'">' .do_shortcode($content). '</p>';
}
add_shortcode('p', 'wpts_p');
	
function wpts_br($atts, $content = null, $code) {
	return '<br />';
}
add_shortcode('br', 'wpts_br');

/*-----------------------------------------------------------------------------------*/
/* [pdf] Embed a PDF file
/*-----------------------------------------------------------------------------------*/

function wpts_pdflink($attr, $content) {
	return '<a class="pdf" href="http://docs.google.com/viewer?url=' . $attr['href'] . '">'.$content.'</a>';
}
add_shortcode('pdf', 'wpts_pdflink');

/*-----------------------------------------------------------------------------------*/
/* [ipdf] Embed a PDF file in a Iframe
/*-----------------------------------------------------------------------------------*/

function wpts_ipdf($attr) {
    return '<iframe src="http://docs.google.com/viewer?url=' . $attr['url'] . '&embedded=true" style="width:' .$attr['width']. '; height:' .$attr['height']. ';" frameborder="0">Your browser should support iFrame to view this PDF document</iframe>';
}
add_shortcode('ipdf', 'wpts_ipdf');

/*-----------------------------------------------------------------------------------*/
/* [highlight] Highlight a Text Section
/*-----------------------------------------------------------------------------------*/

function wpts_highlight($atts, $content = null, $code)
{
	extract( shortcode_atts( array(
		'color' => '',
		'custom' => '',
	), $atts));
		
	if($color != '') { $color = ' highlight-'.$color; }
		
	if($custom != '') { $custom = ' style="background-color: #'.$custom.';"'; }
		
	return '<span class="highlight'.$color.'" '.$custom.'>'.do_shortcode($content).'</span>';	
}
add_shortcode('highlight', 'wpts_highlight');

/*-----------------------------------------------------------------------------------*/
/* [dropcap] Add a dropcap to a letter
/*-----------------------------------------------------------------------------------*/

function wpts_dropcaps($atts, $content = null, $code) {
	extract( shortcode_atts( array (
		'color' => '',
		'type' => 'normal'
	), $atts));

	if($color != ''){
		$color = ' dropcap-'.$color;
	}
	
	return '<span class="dropcap dropcap-'.$type . $color . '">' . do_shortcode($content) . '</span>';
}
add_shortcode('dropcap', 'wpts_dropcaps');

/*-----------------------------------------------------------------------------------*/
/* Columns Shortcodes
/*-----------------------------------------------------------------------------------*/

function wpts_column($atts, $content = null, $code) 
{
	$last = '';
		if ( isset( $atts[0] ) && trim( $atts[0] ) == 'last')
		$last = ' last';
	return '<div class="'.$code.$last.'">' . do_shortcode(trim($content)) . '</div>';
}

add_shortcode('one_half', 'wpts_column'); 
add_shortcode('one_third', 'wpts_column'); 
add_shortcode('one_fourth', 'wpts_column'); 
add_shortcode('one_fifth', 'wpts_column'); 
add_shortcode('one_sixth', 'wpts_column'); 

add_shortcode('two_third', 'wpts_column'); 
add_shortcode('three_fourth', 'wpts_column'); 
add_shortcode('two_fifth', 'wpts_column'); 
add_shortcode('three_fifth', 'wpts_column'); 
add_shortcode('four_fifth', 'wpts_column'); 
add_shortcode('five_sixth', 'wpts_column'); 

function wpts_column_last($atts, $content = null, $code) 
{
	return '<div class="'.str_replace('_last','',$code).' last">' . do_shortcode(trim($content)) . '</div><div class="clearboth"></div>';
}

add_shortcode('one_half_last', 'wpts_column_last'); 
add_shortcode('one_third_last', 'wpts_column_last'); 
add_shortcode('one_fourth_last', 'wpts_column_last'); 
add_shortcode('one_fifth_last', 'wpts_column_last'); 
add_shortcode('one_sixth_last', 'wpts_column_last'); 

add_shortcode('two_third_last', 'wpts_column_last'); 
add_shortcode('three_fourth_last', 'wpts_column_last'); 
add_shortcode('two_fifth_last', 'wpts_column_last'); 
add_shortcode('three_fifth_last', 'wpts_column_last'); 
add_shortcode('four_fifth_last', 'wpts_column_last'); 
add_shortcode('five_sixth_last', 'wpts_column_last'); 

/*-----------------------------------------------------------------------------------*/
/* [tabs] Different Tabs
/*-----------------------------------------------------------------------------------*/

function wpts_tabs($atts, $content = null, $code) 
{
	wp_enqueue_script( 'jquery-tabs' );
	wp_enqueue_script( 'jquery-tabs-init' );
	
	extract(shortcode_atts(array(
		'style' => false
	), $atts));
	
	if (!preg_match_all("/(.?)\[(tab)\b(.*?)(?:(\/))?\](?:(.+?)\[\/tab\])?(.?)/s", $content, $matches)) {
		return do_shortcode($content);
	} else {
		for($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
		}
		$output = '<ul class="'.$code.'">';
		
		for($i = 0; $i < count($matches[0]); $i++) {
			$output .= '<li><a href="#">' . $matches[3][$i]['title'] . '</a></li>';
		}
		$output .= '</ul>';
		$output .= '<div class="panes">';
		for($i = 0; $i < count($matches[0]); $i++) {
			$output .= '<div class="pane">' . do_shortcode(trim($matches[5][$i])) . '</div>';
		}
		$output .= '</div>';
		if($code == 'tabs_vertical')
		{
			$output .= '<div class="clearboth"></div>';
		}
		
		return '<div class="'.$code.'_container">' . $output . '</div>';
	}
}

add_shortcode('tabs', 'wpts_tabs');
add_shortcode('tabs_framed', 'wpts_tabs');
add_shortcode('tabs_button', 'wpts_tabs');
add_shortcode('tabs_vertical', 'wpts_tabs');

/*-----------------------------------------------------------------------------------*/
/* [accordions] Accordion
/*-----------------------------------------------------------------------------------*/

function wpts_accordions($atts, $content = null, $code) 
{
	wp_enqueue_script( 'jquery-tabs' );
	wp_enqueue_script( 'jquery-tabs-init' );
	
	extract(shortcode_atts(array(
		'style' => false
	), $atts));
	
	if (!preg_match_all("/(.?)\[(accordion)\b(.*?)(?:(\/))?\](?:(.+?)\[\/accordion\])?(.?)/s", $content, $matches)) {
		return do_shortcode($content);
	} else {
		for($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
		}
		$output = '';
		for($i = 0; $i < count($matches[0]); $i++) {
			$output .= '<div class="tab">' . $matches[3][$i]['title'] . '</div>';
			$output .= '<div class="pane">' . do_shortcode(trim($matches[5][$i])) . '</div>';
		}

		return '<div class="accordion">' . $output . '</div>';
	}
}

add_shortcode('accordions', 'wpts_accordions');

/*-----------------------------------------------------------------------------------*/
/* [toggle] Toggle
/*-----------------------------------------------------------------------------------*/

function wpts_toggle($atts, $content = null, $code) 
{
	wp_enqueue_script( 'jquery-tabs' );
	wp_enqueue_script( 'jquery-tabs-init' );
	
	extract(shortcode_atts(array(
		'title' => false
	), $atts));
	return '<div class="toggle"><h4 class="toggle_title">' . $title . '</h4><div class="toggle_content">' . do_shortcode(trim($content)) . '</div></div>';
}

add_shortcode('toggle', 'wpts_toggle');

/*-----------------------------------------------------------------------------------*/
/* [table] Tables
/*-----------------------------------------------------------------------------------*/

function wpts_table($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'id' => '',
		'class' => '',
		'colspan' => '',
		'rowspan' => '',
		'width' => '',
		'type' => '',
	), $atts));
		
	if($id != '') { $id = ' id="'.$id.'"'; }
	if($width != '') { $width = ' style="width: '.$width.';"'; }
	if($colspan != '') { $colspan = ' colspan="'.$colspan.'"'; }
	if($rowspan != '') { $rowspan = ' rowspan="'.$rowspan.'"'; }
	if($type != '') { $type = $type.'-style'; }
	
	return '<'.$code.' '.$id.' '.$width.' class="table_style '.$class.' '.$type.'" '.$colspan.$rowspan.'>' .do_shortcode($content). '</'.$code.'>';
}

function wpts_colgroup($atts, $content = null, $code) {

	return '<colgroup>
		        <col class="onecol-first">
            </colgroup>';
}
	
add_shortcode('table', 'wpts_table');
add_shortcode('thead', 'wpts_table');
add_shortcode('tfoot', 'wpts_table');
add_shortcode('tbody', 'wpts_table');
add_shortcode('colgroup', 'wpts_colgroup');
add_shortcode('tr', 'wpts_table');
add_shortcode('td', 'wpts_table');
add_shortcode('th', 'wpts_table');

/*-----------------------------------------------------------------------------------*/
/* [button] Default Button
/*-----------------------------------------------------------------------------------*/



/*-----------------------------------------------------------------------------------*/
/* [clean_button] Clean Button
/*-----------------------------------------------------------------------------------*/

function wpts_clean_button($atts, $content = null, $code) 
{
	extract(shortcode_atts(array(
		'id' => '',
		'class' => '',
		'href' => '#',
		'target' => '',
		'align' => '',
		'color' => '',
		'size' => '',
		'shape' => '',
		'desc' => '',
		'icon' => '',
		'iconurl' => '',
		'rel' => '',
		'gallery' => '',
	), $atts));
	
	/** ID & TARGET **/
	if($id != '') { $id = ' id="'.$id.'" '; }
	if($target != '') { $target = ' target="'.$target.'" '; }
	
	/** CUSTOM ICON **/
	if($iconurl != '') { $iconurl = ' style="background:url('.$iconurl.') no-repeat right center;padding-right:30px;margin-right:0px;" '; }
	
	/** ICON **/
	if($icon != '') { $icon = 'dl-'.$icon; }
	
	/** DESC **/
	if($desc != '') { $desc = '<em>'.$desc.'</em>'; }
	
	/** GALLERY **/
	
	if($gallery != '') { $gallery = '['.$gallery.']'; }
	
	/** REL **/
	if($rel != '') { $rel = ' rel="'.$rel.$gallery.'" '; }
	
	$button = '<a class="clean-button '.$color.' '.$size.' '.$shape.' '.$icon.' '.$class.'" '.$rel.' href="'.$href.'" '.$id.' '.$target.' ><span'.$iconurl.'>'.trim($content).' '.trim($desc).'</span></a>';
	
	/** ALIGNMENT **/
	if($align != '') {
		return '<p class="align-'.$align.'">'.$button.'</p>';
	}
	else {
		return $button;
	}
}

add_shortcode('clean_button','wpts_clean_button');

/*-----------------------------------------------------------------------------------*/
/* [social_button] Social Button
/*-----------------------------------------------------------------------------------*/

function wpts_social_button($atts, $content = null, $code) 
{
	extract(shortcode_atts(array(
		'id' => '',
		'class' => '',
		'href' => '#',
		'target' => '',
		'align' => '',
		'color' => '',
		'size' => '',
		'style' => '',
		'icon' => '',
		'rel' => '',
		'gallery' => '',
	), $atts));
	
	/** ID & TARGET **/
	if($id != '') { $id = ' id="'.$id.'" '; }
	if($target != '') { $target = ' target="'.$target.'" '; }
	
	/** GALLERY **/
	
	if($gallery != '') { $gallery = '['.$gallery.']'; }
	
	/** REL **/
	if($rel != '') { $rel = ' rel="'.$rel.$gallery.'" '; }
	
	$button = '<a '.$id.' href="'.$href.'" '.$target.' '.$rel.' class="sb '.$color.' '.$size.' '.$style.' '.$icon.' '.$class.'">'.trim($content).'</a>';
	
	/** ALIGNMENT **/
	if($align != '') {
		return '<p class="align-'.$align.'">'.$button.'</p>';
	}
	else {
		return $button;
	}
}

add_shortcode('social_button','wpts_social_button');

/*-----------------------------------------------------------------------------------*/
/* [mosaic] Mosaic Overlay
/*-----------------------------------------------------------------------------------*/

function wpts_mosaic($atts, $content = null, $code) 
{
	wp_enqueue_script( 'jquery-mosaic' );
	wp_enqueue_script( 'jquery-mosaic-init' );
	
	extract(shortcode_atts(array(
		'id' => '',
		'class' => '',
		'href' => '#',
		'target' => '',
		'rel' => '',
		'type' => 'circle',
		'width' => '',
		'height' => '',
		'image' => '',
		'title' => '',
		'desc' => '',
		'gallery' => '',
	), $atts));
	
	/** ID & TARGET **/
	if($id != '') { $id = ' id="'.$id.'" '; }
	if($target != '') { $target = ' target="'.$target.'" '; }
	
	/** GALLERY **/
	
	if($gallery != '') { $gallery = '['.$gallery.']'; }
	
	/** REL **/
	if($rel != '') { $rel = ' rel="'.$rel.$gallery.'" '; }
	
	/** DESCRIPITION **/
	if($desc != '') { $desc = '<p>'.$desc.'</p>'; }

	$details = '';
	
	/** TITLE **/
	if($title != '') { 
		$details = '<div class="details">
					<h4>'.$title.'</h4>
					'.$desc.'
				</div>';
		
	}
	
	if($type == "circle") {
		$details = '';
	}
	
	$content = '[raw]<div class="mosaic-block '.$type.' '.$class.'" style="width: '.$width.'px; height: '.$height.'px;">';
	
	if($type == "slide-left" OR $type == "slide-corner") {
		$content .= '<a class="mosaic-backdrop" href="'.$href.'" '.$rel.' '.$target.'>'.$details.'</a>
			<div class="mosaic-overlay">
				<img src="'.$image.'" />
			</div>';
	}
	else {
		$content .= '<div class="mosaic-backdrop"><img src="'.$image.'" /></div>
			<a href="'.$href.'" '.$target.' '.$rel.' class="mosaic-overlay">
				'.$details.'
			</a>';
	}
	
	$content .= '</div>[/raw]';
	
	return $content;
}

add_shortcode('mosaic','wpts_mosaic');

/*-----------------------------------------------------------------------------------*/
/* [snapshot] Snapshot
/*-----------------------------------------------------------------------------------*/

function wpts_snapshot($atts, $content = null) {
        extract(shortcode_atts(array(
			"snap" => 'http://s.wordpress.com/mshots/v1/',
			"url" => 'http://www.catswhocode.com',
			"alt" => ' ',
			"width" => '400',
			"height" => '300'
        ), $atts));

	$img = '<img src="' . $snap . '' . urlencode($url) . '?w=' . $width . '&h=' . $height . '" alt="' . $alt . '"/>';
        return $img;
}

add_shortcode("snapshot", "wpts_snapshot");

/*-----------------------------------------------------------------------------------*/
/* [gplus] Google+
/*-----------------------------------------------------------------------------------*/

function wpts_gplus($atts, $content = null) {

	wp_enqueue_script('google-plusone', 'https://apis.google.com/js/plusone.js', array(), null);

    extract(shortcode_atts(array(
		"url" => '',
    ), $atts));
		
	global $post;
	
	if($url == '')
	{
		$url = get_permalink();
	}

	$code = '<div class="plusone"><g:plusone size="tall" href="'.$url.'"></g:plusone></div>';
    return $code;
}

add_shortcode("gplus", "wpts_gplus");

/*-----------------------------------------------------------------------------------*/
/* [like] Like Facebook+
/*-----------------------------------------------------------------------------------*/


function wpts_like($atts, $content = null) {
    extract(shortcode_atts(array(
		'url' => '',
		'lang' => 'en_US',
		'layout' => ''
    ), $atts));
	
	global $post;
	
	if($url == '')
	{
		$url = get_permalink();
	}

	if($layout == '' OR $layout == 'like')
	{
		return '<script src="http://connect.facebook.net/'.$lang.'/all.js#xfbml=1"></script><div class="fb-like" data-href="'.$url.'" data-send="true" data-width="450" data-show-faces="true"></div>';
	}
	else if($layout == 'count')
	{
		return '<script src="http://connect.facebook.net/'.$lang.'/all.js#xfbml=1"></script><div class="fb-like" data-href="'.$url.'" data-send="true" data-layout="button_count" data-width="450" data-show-faces="true"></div>';
	}
	else if($layout == 'box')
	{
		return '<script src="http://connect.facebook.net/'.$lang.'/all.js#xfbml=1"></script><div class="fb-like" data-href="'.$url.'" data-send="true" data-layout="box_count" data-width="450" data-show-faces="true"></div>';
	}
}	

add_shortcode( 'fb_like', 'wpts_like' );

/*-----------------------------------------------------------------------------------*/
/* [pin] Pinterest Button
/*-----------------------------------------------------------------------------------*/

function wpts_pin($atts) {

	wp_enqueue_script( 'pin-init' );

	extract(shortcode_atts(array(
		'url' => '',
		'image' => '',
		'layout' => 'vertical',
		'title' => '',
    ), $atts));
	
	global $post;
	
	if($url == '')
	{
		$url = get_permalink($post->ID);
	}
	if($image == '') {
		$attch = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		$image = $attch[0];
	}
	if($title == '')
	{
		$title = get_the_title();
	}
	
	return '<a href="http://pinterest.com/pin/create/button/?url' . urlencode($url) . '&media=' . $image . '&description=' . $title .'" class="pin-it-button" count-layout="'.$layout.'">Pin It</a>'; 
}

add_shortcode('pin', 'wpts_pin');

/*-----------------------------------------------------------------------------------*/
/* [tweet] Retweet Button
/*-----------------------------------------------------------------------------------*/

function wpts_tweetmeme(){
	return '<div class="tweetmeme"><script type="text/javascript" src="http://tweetmeme.com/i/scripts/button.js"></script></div>';
}
add_shortcode('tweet', 'wpts_tweetmeme');

/*-----------------------------------------------------------------------------------*/
/* [tweet_button] Retweet Button
/*-----------------------------------------------------------------------------------*/

function wpts_twitter_button($atts){
	wp_enqueue_script( 'tweet-api' );
	extract(shortcode_atts(array(
		'url' => '',
		'layout' => 'none'
    ), $atts));
	
	global $post;
	
	if($url == '')
	{
		$url = get_permalink($post->ID);
	}
	
	return '<a href="https://twitter.com/share" data-url="'.$url.'" class="twitter-share-button" data-related="" data-lang="en" data-size="medium" data-count="'.$layout.'">Tweet</a>';
}
add_shortcode('tweet_button', 'wpts_twitter_button');

/*-----------------------------------------------------------------------------------*/
/* [twitter_follow] Followers Twitter
/*-----------------------------------------------------------------------------------*/

function wpts_twitter($atts){
	extract(shortcode_atts(array(
		'account' => '',
		'name' => ''
    ), $atts));
	return '<a href="https://twitter.com/'.$account.'" class="twitter-follow-button" data-show-count="true" data-lang="en">Follow @'.$name.'</a>';
}
add_shortcode('twitter_follow', 'wpts_twitter');

/*-----------------------------------------------------------------------------------*/
/* [donate] Donate with PayPal
/*-----------------------------------------------------------------------------------*/

function wpts_donate( $atts, $content = null) {
	global $post;
	extract(shortcode_atts(array(
		'account' => 'your-paypal-email-address',
		'for' => $post->post_title,
		'onHover' => '',
	), $atts));
	if(empty($content)) $content='Make A Donation';
		return '<a target="_blank" href="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business='.$account.'&item_name=Donation for '.$for.'" title="'.$onHover.'">'.$content.'</a>';
}
add_shortcode('donate', 'wpts_donate');

/*-----------------------------------------------------------------------------------*/
/* [blank] Blank line
/*-----------------------------------------------------------------------------------*/

function wpts_blankline() {
    return '<p>&nbsp;</p>';
}
add_shortcode('blank', 'wpts_blankline');

/*-----------------------------------------------------------------------------------*/
/* [show_file] Shows file in page
/*-----------------------------------------------------------------------------------*/

function wpts_show_file( $atts ) {
  extract( shortcode_atts( array(
    'file' => ''
  ), $atts ) );

  if ($file!='')
    return @file_get_contents($file);
}

add_shortcode( 'show_file', 'wpts_show_file' );

/*-----------------------------------------------------------------------------------*/
/* [rss] Displays RSS feed
/*-----------------------------------------------------------------------------------*/

include_once(ABSPATH.WPINC.'/feed.php');

function wpts_readrss($atts) {
    extract(shortcode_atts(array(
	"feed" => 'http://',
    "num" => '1',
    ), $atts));

    $rss = fetch_feed($feed);
	
	if (!is_wp_error( $rss ) ) :	
		$maxitems = $rss->get_item_quantity($num); 
		$rss_items = $rss->get_items(0, $maxitems); 
	endif;

	$content = '';
		
	$content .= '[raw] <ul>';
		if ($maxitems == 0) $content .= '<li>No items.</li>';
		else
			foreach ( $rss_items as $item ) : 
			$content .= '<li>';
				$content .= '<a href="'.esc_url( $item->get_permalink() ).'"
				title="Posted '.$item->get_date('j F Y | g:i a').'">
				'.esc_html( $item->get_title() ).'</a>
			</li>';
		endforeach;
	$content .= '</ul> [/raw]';
		
	return $content;

}

add_shortcode('rss', 'wpts_readrss');

/*-----------------------------------------------------------------------------------*/
/* [twitter] Displays RSS feed
/*-----------------------------------------------------------------------------------*/

function wpts_twitter_feed($atts) 
{

wp_enqueue_script( 'jquery-tweet' );

extract(shortcode_atts(array(
		'username' => '',
		'count' => 3,
		'query' => 'null',
		'avatarsize' => 'null',
		'domain' => '',
	), $atts));
	
	$user_array = explode(',',$username);
	foreach($user_array as $key => $user){
		$user_array[$key] = '"'.$user.'"';
	}	
	
	$id = rand(1,1000);
	
	$seconds_ago_text = __('about %d seconds ago',$domain);
	$a_minutes_ago_text = __('about a minute ago',$domain);
	$minutes_ago_text = __('about %d minutes ago',$domain);
	$a_hours_ago_text = __('about an hour ago',$domain);
	$hours_ago_text = __('about %d hours ago',$domain);
	$a_day_ago_text = __('about a day ago',$domain);
	$days_ago_text = __('about %d days ago',$domain);
	$view_text = __('view tweet on twitter',$domain);
	
	if ( !empty( $user_array )|| $query!="null" ) {
		$username = implode(',',$user_array);
		if($query != "null"){
			$query = '"'.html_entity_decode($query).'"';
		}
		$with_avatar = ($avatarsize != 'null')?' with_avatar':'';
		return <<<HTML
<div class="twitter_wrap{$with_avatar}">
	<div id="twitter_wrap_{$id}"></div>
	<div class="clearboth"></div>
</div>
<script type="text/javascript">
	jQuery(function($){
		jQuery("#twitter_wrap_{$id}").tweet({
			username: {$username},
			count: {$count},
			query: {$query},
			avatar_size: {$avatarsize},
			seconds_ago_text: '{$seconds_ago_text}',
			a_minutes_ago_text: '{$a_minutes_ago_text}',
			minutes_ago_text: '{$minutes_ago_text}',
			a_hours_ago_text: '{$a_hours_ago_text}',
			hours_ago_text: '{$hours_ago_text}',
			a_day_ago_text: '{$a_day_ago_text}',
			days_ago_text: '{$days_ago_text}',
			view_text: '{$view_text}',
			template: "{text} {time}"
		});
	});
</script>
HTML;
	}
}
add_shortcode('twitter', 'wpts_twitter_feed');

/*-----------------------------------------------------------------------------------*/
/* [related_posts] Displays Related Posts
/*-----------------------------------------------------------------------------------*/

function wpts_related_posts( $atts ) {
	extract(shortcode_atts(array(
	    'limit' => '5',
	), $atts));

	global $wpdb, $post, $table_prefix;

	if ($post->ID) {
		$retval = '<ul>';
 		// Get tags
		$tags = wp_get_post_tags($post->ID);
		$tagsarray = array();
		foreach ($tags as $tag) {
			$tagsarray[] = $tag->term_id;
		}
		$tagslist = implode(',', $tagsarray);

		// Do the query
		$q = "SELECT p.*, count(tr.object_id) as count
			FROM $wpdb->term_taxonomy AS tt, $wpdb->term_relationships AS tr, $wpdb->posts AS p WHERE tt.taxonomy ='post_tag' AND tt.term_taxonomy_id = tr.term_taxonomy_id AND tr.object_id  = p.ID AND tt.term_id IN ($tagslist) AND p.ID != $post->ID
				AND p.post_status = 'publish'
				AND p.post_date_gmt < NOW()
 			GROUP BY tr.object_id
			ORDER BY count DESC, p.post_date_gmt DESC
			LIMIT $limit;";

		$related = $wpdb->get_results($q);
 		if ( $related ) {
			foreach($related as $r) {
				$retval .= '<li><a title="'.wptexturize($r->post_title).'" href="'.get_permalink($r->ID).'">'.wptexturize($r->post_title).'</a></li>';
			}
		} else {
			$retval .= '
	<li>No related posts found</li>';
		}
		$retval .= '</ul>';
		return $retval;
	}
	return;
}
add_shortcode('related_posts', 'wpts_related_posts');

/*-----------------------------------------------------------------------------------*/
/* [info] [success] [error] [notice] Displays Error Message
/*-----------------------------------------------------------------------------------*/

function wpts_boxes($atts, $content = null, $code) 
{
	extract(shortcode_atts( array(
		'align' => '',
	), $atts));
		
	if($align != '') { $align = ' align-'.$align; }
		
	return '<div class="' . $code . $align . '"><div class="box-content">' . do_shortcode($content) . '</div><div class="clearboth"></div></div>';
}

add_shortcode('info','wpts_boxes');
add_shortcode('success','wpts_boxes');
add_shortcode('error','wpts_boxes');
add_shortcode('notice','wpts_boxes');

/*-----------------------------------------------------------------------------------*/
/* [notification] Displays notification box with close button
/*-----------------------------------------------------------------------------------*/

function wpts_notification($atts, $content = null, $code) 
{
	wp_enqueue_script( 'jquery-boxes' );
	
	extract(shortcode_atts( array(
		'align' => 'left',
		'type' => 'info',
	), $atts));
		
	if($align != '') { $align = ' align-'.$align; }
		
	return '[raw]<div class="notification-box notification-box-'.$type.' align-'.$align.'"><p>' . do_shortcode($content) . '</p><a href="#" class="notification-close notification-close-'.$type.'">x</a></div>[/raw]';
}

add_shortcode('notification','wpts_notification');

/*-----------------------------------------------------------------------------------*/
/* [blockquote] Displays blockquote
/*-----------------------------------------------------------------------------------*/

/*function wpts_blockquote($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'align' => '',
		'style' => 'default',
		'author' => '',
		'color' => ''
	), $atts));
	
	if($align != '') { $align = 'block-'.$align; }
	
	if($color != '') { $color = 'block-'.$color; }
		
	return '<div class="blockquote blockquote-'.$style.' '.$color.' '.$align.'"><blockquote>' . do_shortcode($content) . ($author ? '<p class="author">- '  . $author . '</p>' : '') . '</blockquote></div>';
}

add_shortcode('blockquote', 'wpts_blockquote');

/*-----------------------------------------------------------------------------------*/
/* [pullquote] Displays Pullquote
/*-----------------------------------------------------------------------------------*/

function wpts_pullquote($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'align' => '',
		'style' => 'default',
	), $atts));
	
	if($align != '') { $align = 'pull-'.$align; }
	
	return '<span class="pullquote pullquote-'.$style.' '.$align.'">' . do_shortcode($content) . '</span>';
}

add_shortcode('pullquote', 'wpts_pullquote');

/*-----------------------------------------------------------------------------------*/
/* [tooltip] Displays Tooltip
/*-----------------------------------------------------------------------------------*/

function wpts_tooltip($atts, $content = null, $code) {
	wp_enqueue_script( 'jquery-tooltip' );
	wp_enqueue_script( 'jquery-tool-init' );
	
	extract(shortcode_atts(array(
		'position' => 'bottom',
		'title' => '',
	), $atts));
			
	return '<a href="" class="tooltip-'.$position.'" title="'.$title.'">' . do_shortcode($content) . '</a>';
}

add_shortcode('tooltip', 'wpts_tooltip');

/*-----------------------------------------------------------------------------------*/
/* [prettyphoto] Displays in PrettyPhoto
/*-----------------------------------------------------------------------------------*/

function wpts_prettyphoto($atts, $content = null, $code) {

	extract(shortcode_atts(array(
		'href' => '',
		'gallery' => '',
		'iframe' => 'false',
		'ajax' => 'false',
		'width' => '100%',
		'height' => '100%',
		'title' => '',
	), $atts));
	
	if($gallery != '') { $gallery = '['.$gallery.']'; }
	
	$addUrl = '';

	if($iframe == 'true')
	{
		$addUrl .= '?iframe=true&width='.$width.'&height='.$height.'&ajax='.$ajax.'';
	}
	
	return '<a href="'.$href.$addUrl.'" rel="prettyPhoto'.$gallery.'" title="'.$title.'">' . do_shortcode($content) . '</a>';
}

add_shortcode('lightbox', 'wpts_prettyphoto');

/*-----------------------------------------------------------------------------------*/
/* [popup] Displays a Popup
/*-----------------------------------------------------------------------------------*/

function wpts_popup($atts, $content = null, $code) {

	wp_enqueue_script( 'jquery-popup', get_template_directory_uri() . '/wpts/shortcodes/assets/js/jquery-popup.js', array('jquery'), NULL );
	
	extract(shortcode_atts(array(
		'message' => 'jQueryPopup'
	), $atts));
			
	return '<a href="javascript:popup(\''.$message.'\');" >' . do_shortcode($content) . '</a>';
}

add_shortcode('popup', 'wpts_popup');



/*-----------------------------------------------------------------------------------*/
/* [shadow] Displays a Shadow
/*-----------------------------------------------------------------------------------*/

function wpts_shadow($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'type' => 'lifted',
		'width' => '',
		'height' => '',
		'class' => '',
	), $atts));
	
	$add = '';
	
	if($type == 'curved-vt-1' OR $type == 'curved-vt-2' OR $type == 'curved-hz-1' OR $type == 'curved-hz-2')
	{
		$add = 'curved';
	}
			
	return '<div class="drop-shadow '.$add.' '.$type.' '.$class.'" style="width: '.$width.'; height: '.$height.';">' . do_shortcode($content) . '</div>';
}

add_shortcode('shadow', 'wpts_shadow');

/*-----------------------------------------------------------------------------------*/
/* [spoiler] Displays a Spoiler
/*-----------------------------------------------------------------------------------*/

function wpts_spoiler($atts, $content = null, $code) {

	wp_enqueue_script( 'jquery-spoiler', get_template_directory_uri() . '/wpts/shortcodes/assets/js/jquery-spoiler.js', array('jquery'), NULL );
	
	return '<span class="spoiler">' . do_shortcode($content) . '</span>';
}

add_shortcode('spoiler', 'wpts_spoiler');

/*-----------------------------------------------------------------------------------*/
/* [pricing_section] Displays a Pricing Table Section
/*-----------------------------------------------------------------------------------*/

function wpts_pricing_section($atts, $content = null, $code) {

	extract(shortcode_atts(array(
		'name' => '',
		'link' => '',
		'linkname' => '',
		'price' => '',
		'per' => '',
		'color' => '',
		'featured' => '',
	), $atts));
	
	global $price_cols;
		
	$w = 100 / $price_cols;
	
	if($featured != '') { $featured = 'featured'; }
	
	$sec_shadow = '';
	$bg_style = '';
	
	if($color != '') {
		$sec_shadow = '-webkit-box-shadow: 0px 0px 0px 1px #'.$color.'; -moz-box-shadow: 0px 0px 0px 1px #'.$color.';	box-shadow: 0px 0px 0px 1px #'.$color.';';
		$bg_style = 'style="background-color: #'.$color.';"';
	}

	return '<div class="section '.$featured.'" style="width: '.$w.'%; '.$sec_shadow.'">
			<div class="section_title" '.$bg_style.'>
				<h1>'.$name.'</h1>
			</div> <!-- .section_title -->
			<div class="section_price" '.$bg_style.'>
				<p><span>'.$price.'</span> / '.$per.'</p>
			</div> <!-- .section-price -->
			<div class="section-items">
				'. do_shortcode($content) .'
			</div> <!-- .section-items -->
			<div class="button-table">
				<a href="'.$link.'" class="button medium white"><span>'.$linkname.'</span></a>
			</div> <!-- .button-table -->
		</div> <!-- .section -->';
}

add_shortcode('pricing_section', 'wpts_pricing_section');

/*-----------------------------------------------------------------------------------*/
/* [pricing_table] Displays a Pricing Table
/*-----------------------------------------------------------------------------------*/

function wpts_pricing_table($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'col' => ''
	), $atts));
	
	global $price_cols;
	$price_cols = $col;
				
	$content = '[raw]
	<div class="pricing_table">
			' . do_shortcode($content)  . '
		<div class="clearboth"></div>
	</div>[/raw]
	';
	
	return $content;
}

add_shortcode('pricing_table', 'wpts_pricing_table');

/*-----------------------------------------------------------------------------------*/
/* [social] Displays a Social Icon
/*-----------------------------------------------------------------------------------*/

function wpts_social_icon($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'href' => '#',
		'target' => '',
		'type' => 'noborder',
		'icon' => '',
		'hover' => ''
	), $atts));
	
	if($target != '') { $target = ' target="'.$target.'" '; }
	
	$var = '';
	
	if($type == 'border') { $var = '-variation'; }
	
	if($hover == 'true') { $hover = 'social-hover'; }
		
	return '<a class="social-icon '.$hover.'" href="'.$href.'" '.$target.'><img src="' . get_template_directory_uri() . '/wpts/shortcodes/assets/images/social/'.$type.'/'.$icon.$var.'.png" alt="'.$icon.'" /></a>';
}

add_shortcode('social', 'wpts_social_icon');

/*-----------------------------------------------------------------------------------*/
/* [pay_icon] Displays a Payment Icon
/*-----------------------------------------------------------------------------------*/

function wpts_pay_icon($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'icon' => '',
		'type' => 'curved',
		'size' => '32'
	), $atts));
		
	return '<img src="' . get_template_directory_uri() . '/wpts/shortcodes/assets/images/pay_icons/'.$icon.'-'.$type.'-'.$size.'px.png" alt="'.$icon.'" />';
}

add_shortcode('pay_icon', 'wpts_pay_icon');

/*-----------------------------------------------------------------------------------*/
/* [testimonials_widget] Displays a Testimonial Widget
/*-----------------------------------------------------------------------------------*/

function wpts_testimonial_widget($atts, $content = null, $code) {
	
	wp_enqueue_script( 'jquery-testimonial-init', get_template_directory_uri() . '/wpts/shortcodes/assets/js/testimonial-init.js', array('jquery'), NULL );
	
	return '[raw]
	<div class="testimonial-widget">
		<div class="testimonial-items">
			'. do_shortcode( $content ) .'
		</div> <!-- .testimonial-items -->
		<div class="testimonial-nav">
			<a href="#" class="testimonial-nav-previous">&larr;</a> <a href="#" class="testimonial-nav-next">&rarr;</a>
		</div>
	</div>[/raw]';
}

add_shortcode('testimonial_widget', 'wpts_testimonial_widget');

/*-----------------------------------------------------------------------------------*/
/* [testimonial] Displays a single Testimonial to Widget
/*-----------------------------------------------------------------------------------*/

function wpts_testimonial($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'author' => '',
		'bgcolor' => '',
		'color' => '',
		'shadow' => '',
	), $atts));
	
	if($bgcolor != '') {
		$bgcolor = 'background-color: #'.$bgcolor.';';
	}
	
	if($color != '') {
		$color = 'color: #'.$color.';';
	}
	
	if($shadow == 'true') {
		$shadow = ' -webkit-box-shadow: inset 0px -1px 0px 1px rgba(0, 0, 0, 0.2); -moz-box-shadow: inset 0px -1px 0px 1px rgba(0, 0, 0, 0.2); box-shadow: inset 0px -1px 0px 1px rgba(0, 0, 0, 0.2);';
	}
	
	return '
		<div class="testimonial">
			<div class="testimonial-content" style="'.$bgcolor.' '.$color.' '.$shadow.'">'. do_shortcode($content) .'</a></div>
			<div class="testimonial-meta"><span>'.$author.'</span></div>
		</div>';
}

add_shortcode('testimonial', 'wpts_testimonial');

/*-----------------------------------------------------------------------------------*/
/* [testimonial_block] Displays a Testimonial Block
/*-----------------------------------------------------------------------------------*/

function wpts_testimonial_block($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'author' => '',
		'authorimg' => '',
		'type' => 'dark-block',
		'bgcolor' => '',
		'color' => '',
		'url' => '',
	), $atts));
	
	if($bgcolor != '') {
		$bgcolor = 'background-color: #'.$bgcolor.';';
	}
	
	if($color != '') {
		$color = 'color: #'.$color.' !important;';
	}
	
	if($authorimg != '') {
		$authorimg = '<span class="author-img"><img src="'.$authorimg.'" alt="'.$author.'" /></span>';
	}
	
	if($url != '') {
		$url = '<span class="author-url"><a href="http://'.$url.'" target="_blank" style="'.$color.'">'.$url.'</a></span>';
	}
		
	return '
		<div class="testimonial-block '.$type.'" style="'.$bgcolor.' '.$color.'">
			<div class="testimonial-content">'. do_shortcode($content) .'</a></div>
			<div class="testimonial-meta">'.$authorimg.'<span class="author-name">'.$author.$url.'</span></div>
		</div>';
}

add_shortcode('testimonial_block', 'wpts_testimonial_block');

/*-----------------------------------------------------------------------------------*/
/* [color_header] Displays a Color Header
/*-----------------------------------------------------------------------------------*/

function wpts_color_header($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'color' => '',
		'border' => '',
	), $atts));
	
	if($border != '') {
		$border = '<span class="header-border"></span>';
	}
		
	return '
	<div class="color-header '.$color.'"><h3><span>' . do_shortcode( $content ).'</span></h3>' . $border.'</div>';
}

add_shortcode('color_header', 'wpts_color_header');

/*-----------------------------------------------------------------------------------*/
/* [image_header] Displays a Header with Image Background
/*-----------------------------------------------------------------------------------*/

function wpts_image_header($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'src' => '',
	), $atts));
	
	if($src != '') {
		$src = 'style="background-image: url(\''.$src.'\');"';
	}
	
	return '
	<div '.$src.' class="image-header"><h3><span>' . do_shortcode( $content ).'</span></h3></div>';
}

add_shortcode('image_header', 'wpts_image_header');

/*-----------------------------------------------------------------------------------*/
/* [jcarousel] Displays and init a jCarousel
/*-----------------------------------------------------------------------------------*/

function wpts_jcarousel($atts, $content = null, $code) {

	wp_enqueue_script( 'jquery-carousel', get_template_directory_uri() . '/wpts/shortcodes/assets/js/jquery.jcarousel.min.js', array('jquery'), NULL );
	
	extract(shortcode_atts(array(
		'id' => '',
		'visible' => '1',
		'scroll' => '1',
		'wrap' => 'both',
		'auto' => 'no',
	), $atts));
	
	if($id == '') {
		$rand = rand(0, 500);
		$id = 'jCarrousel_'.$rand;
	}
	
	if($auto == 'yes') {
		$auto = '1';
	}
	else {
		$auto = '0';
	}
	
	return '<div id="'.$id.'" class="jcarousel-skin-tango">
	  <div class="jcarousel-container">
		<div class="jcarousel-clip">
		  <ul class="jcarousel-list">
			' . do_shortcode( $content ). '
		  </ul>
		</div>
		<div disabled="disabled" class="jcarousel-prev jcarousel-prev-disabled"></div>
		<div class="jcarousel-next"></div>
	  </div>
	</div>
	
	<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery("#'.$id.'").jcarousel({
			visible : '.$visible.',
			scroll : '.$scroll.',
			wrap : "'.$wrap.'",
			auto : '.$auto.',
		});
	});
	</script>';
	
}

add_shortcode('jcarousel', 'wpts_jcarousel');

/*-----------------------------------------------------------------------------------*/
/* [jslide] Displays a slide in jCarousel
/*-----------------------------------------------------------------------------------*/

function wpts_jslide($atts, $content = null, $code) {
	
	return '<li class="jcarousel-item">'. do_shortcode($content).'</li>';
}

add_shortcode('jslide', 'wpts_jslide');

/*-----------------------------------------------------------------------------------*/
/* [sh] SyntaxHighlight
/*-----------------------------------------------------------------------------------*/

function wpts_sh($atts, $content = null, $code) {

	wp_enqueue_script( 'shCore', get_template_directory_uri() . '/wpts/shortcodes/assets/syntaxhigh/scripts/shCore.js', array(), NULL );
	
	wp_enqueue_script( 'shAutoloader', get_template_directory_uri() . '/wpts/shortcodes/assets/syntaxhigh/scripts/shAutoloader.js', array(), NULL );
	
	wp_enqueue_script( 'shInit', get_template_directory_uri() . '/wpts/shortcodes/assets/syntaxhigh/scripts/shInit.js', array(), '1', true);
	
	wp_enqueue_style( 'shCore-style', get_template_directory_uri() . '/wpts/shortcodes/assets/syntaxhigh/styles/shCore.css', '1', 'all' );
	
	wp_enqueue_style( 'shThemeDefault', get_template_directory_uri() . '/wpts/shortcodes/assets/syntaxhigh/styles/shThemeDefault.css', '1', 'all' );
		
	extract(shortcode_atts(array(
		'lang' => 'plain',
	), $atts));
	
	$content = str_replace('<pre>', '', $content);
	$content = str_replace('</pre>', '', $content);
	$content = str_replace('<br />', '', $content);
	$content = str_replace('<', '&lt;', $content);
	
	return '<pre class="brush: '.$lang.'">
   '.$content.'
	</pre>';
}

add_shortcode('sh', 'wpts_sh');

/*-----------------------------------------------------------------------------------*/
/* [list] Display icons in a list
/*-----------------------------------------------------------------------------------*/

function wpts_list($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'icon' => '',
	), $atts));
	
	if($icon != '') {
		$icon = 'list-'.$icon;
	}
		
	return '<div class="list-icon '.$icon.'">'.do_shortcode($content).'</div>';
}

add_shortcode('list', 'wpts_list');


/*-----------------------------------------------------------------------------------*/
/* [icon] Display icons in a li element
/*-----------------------------------------------------------------------------------*/

function wpts_li($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'icon' => 'search',
	), $atts));
	
	return '<li class="li-icon icon-'.$icon.'">'.$content.'</li>';
}

add_shortcode('li', 'wpts_li');

/*-----------------------------------------------------------------------------------*/
/* [divider] Display different dividers
/*-----------------------------------------------------------------------------------*/

function wpts_sc_divider()
{
	return '<div class="divider"></div>';
}
add_shortcode('divider', 'wpts_sc_divider');
	
// divider top
	
function wpts_sc_divider_top()
{
	return '<div class="divider top"><a href="#">'.__('Top', 'wpts').'</a></div>';
}
add_shortcode('divider_top', 'wpts_sc_divider_top');

// divider empty

function wpts_sc_divider_empty()
{
	return '<div class="divider-empty"></div>';
}
add_shortcode('divider_empty', 'wpts_sc_divider_empty');

/*-----------------------------------------------------------------------------------*/
/* [video] Display a video player
/*-----------------------------------------------------------------------------------*/

function wpts_video($atts){
	if(isset($atts['type'])){
		switch($atts['type']){
			case 'html5':
				return wpts_video_html5($atts);
				break;
			case 'flash':
				return wpts_video_flash($atts);
				break;
			case 'youtube':
				return wpts_video_youtube($atts);
				break;
			case 'vimeo':
				return wpts_video_vimeo($atts);
				break;
			case 'dailymotion':
				return wpts_video_dailymotion($atts);
				break;
		}
	}
	return '';
}

add_shortcode('video', 'wpts_video');

function wpts_video_html5($atts){
	extract(shortcode_atts(array(
		'mp4' => '',
		'webm' => '',
		'ogg' => '',
		'poster' => '',
		'width' => false,
		'height' => false,
		'preload' => false,
		'autoplay' => false,
		'links' => 'false',
	), $atts));

	if ($height && !$width) $width = intval($height * 16 / 9);
	if (!$height && $width) $height = intval($width * 9 / 16);
	if (!$height && !$width){

	}

	// MP4 Source Supplied
	if ($mp4) {
		$mp4_source = '<source src="'.$mp4.'" type=\'video/mp4; codecs="avc1.42E01E, mp4a.40.2"\'>';
		$mp4_link = '<a href="'.$mp4.'">MP4</a>';
	}

	// WebM Source Supplied
	if ($webm) {
		$webm_source = '<source src="'.$webm.'" type=\'video/webm; codecs="vp8, vorbis"\'>';
		$webm_link = '<a href="'.$webm.'">WebM</a>';
	}

	// Ogg source supplied
	if ($ogg) {
		$ogg_source = '<source src="'.$ogg.'" type=\'video/ogg; codecs="theora, vorbis"\'>';
		$ogg_link = '<a href="'.$ogg.'">Ogg</a>';
	}

	if ($poster) {
		$poster_attribute = 'poster="'.$poster.'"';
		$image_fallback = <<<_end_
			<img src="$poster" width="$width" height="$height" alt="Poster Image" title="No video playback capabilities." />
_end_;
	}

	if ($preload) {
		$preload_attribute = 'preload="auto"';
		$flow_player_preload = ',"autoBuffering":true';
	} else {
		$preload_attribute = 'preload="none"';
		$flow_player_preload = ',"autoBuffering":false';
	}

	if ($autoplay) {
		$autoplay_attribute = "autoplay";
		$flow_player_autoplay = ',"autoPlay":true';
	} else {
		$autoplay_attribute = "";
		$flow_player_autoplay = ',"autoPlay":false';
	}

	$uri = get_template_directory_uri();

	if($links == 'true') {
		$links = "<p class=\"vjs-no-video\"><strong>Download Video:</strong>
		{$mp4_link}
		{$webm_link}
		{$ogg_link}
		</p>";
	}	
	else {
		$links = '';
	}
	
	$output = <<<HTML
<div class="video-container">
<div class="video_frame_html5 video-js-box">
	<video class="video-js" width="{$width}" height="{$height}" {$poster_attribute} controls {$preload_attribute} {$autoplay_attribute}>
		{$mp4_source}
		{$webm_source}
		{$ogg_source}
		<object class="vjs-flash-fallback" width="{$width}" height="{$height}" type="application/x-shockwave-flash"
			data="http://releases.flowplayer.org/swf/flowplayer-3.2.5.swf">
			<param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.5.swf" />
			<param name="allowfullscreen" value="true" />
			<param name="wmode" value="opaque" />
			<param name="flashvars" value='config={"clip":{"url":"$mp4" $flow_player_autoplay $flow_player_preload ,"wmode":"opaque"}}' />
			{$image_fallback}
		</object>
	</video>
	{$links}
</div>
</div>

HTML;

	return '[raw] '.$output.' [/raw]';

}

function wpts_video_flash($atts) {
	extract(shortcode_atts(array(
		'src' 	=> '',
		'width' 	=> false,
		'height' 	=> false,
		'play'			=> 'false',
		'flashvars' => '',
	), $atts));
	
	if ($height && !$width) $width = intval($height * 16 / 9);
	if (!$height && $width) $height = intval($width * 9 / 16);
	if (!$height && !$width){
		/*$height = wpts_get_option('video','flash_height');
		$width = wpts_get_option('video','flash_width');*/
	}

	$uri = get_template_directory_uri();
	if (!empty($src)){
		return <<<HTML
<div class='video-container'>
<div class="video_frame">
<object width="{$width}" height="{$height}" type="application/x-shockwave-flash" data="{$src}">
	<param name="movie" value="{$src}" />
	<param name="allowFullScreen" value="true" />
	<param name="allowscriptaccess" value="always" />
	<param name="expressInstaller" value="{$uri}/swf/expressInstall.swf"/>
	<param name="play" value="{$play}"/>
	<param name="wmode" value="opaque" />
	<embed src="$src" type="application/x-shockwave-flash" wmode="opaque" allowscriptaccess="always" allowfullscreen="true" width="{$width}" height="{$height}" />
</object>
</div>
</div>
HTML;
	}
}

function wpts_video_vimeo($atts) {
	extract(shortcode_atts(array(
		'clip_id' 	=> '',
		'width' => false,
		'height' => false,
		'title' => 'false',
	), $atts));

	if ($height && !$width) $width = intval($height * 16 / 9);
	if (!$height && $width) $height = intval($width * 9 / 16);
	if (!$height && !$width){
		/*$height = wpts_get_option('video','vimeo_height');
		$width = wpts_get_option('video','vimeo_width');*/
	}
	if($title!='false'){
		$title = 1;
	}else{
		$title = 0;
	}

	if (!empty($clip_id) && is_numeric($clip_id)){
		return "<div class='video-container'><div class='video_frame'><iframe src='http://player.vimeo.com/video/$clip_id?title={$title}&amp;byline=0&amp;portrait=0' width='$width' height='$height' frameborder='0'></iframe></div></div>";
	}
}

function wpts_video_youtube($atts, $content=null) {
	extract(shortcode_atts(array(
		'clip_id' 	=> '',
		'width' 	=> false,
		'height' 	=> false,
	), $atts));
	
	if ($height && !$width) $width = intval($height * 16 / 9);
	if (!$height && $width) $height = intval($width * 9 / 16) + 25;
	if (!$height && !$width){
		/*$height = wpts_get_option('video','youbube_height');
		$width = wpts_get_option('video','youbube_width');*/
	}

	if (!empty($clip_id)){
		return "<div class='video-container'><div class='video_frame'><iframe src='http://www.youtube.com/embed/$clip_id' width='$width' height='$height' frameborder='0'></iframe></div></div>";
	}
}

function wpts_video_dailymotion($atts, $content=null) {

	extract(shortcode_atts(array(
		'clip_id' 	=> '',
		'width' 	=> false,
		'height' 	=> false,
	), $atts));
	
	if ($height && !$width) $width = intval($height * 16 / 9);
	if (!$height && $width) $height = intval($width * 9 / 16);
	if (!$height && !$width){
		/*$height = wpts_get_option('video','dailymotion_height');
		$width = wpts_get_option('video','dailymotion_width');*/
	}

	if (!empty($clip_id)){
		return "<div class='video-container'><div class='video_frame'><iframe src=http://www.dailymotion.com/embed/video/$clip_id?width=$width&theme=none&foreground=%23F7FFFD&highlight=%23FFC300&background=%23171D1B&start=&animatedTitle=&iframe=1&additionalInfos=0&autoPlay=0&hideInfos=0' width='$width' height='$height' frameborder='0'></iframe></div></div>";
	}
}

/*-----------------------------------------------------------------------------------*/
/* [gmap] Display a GMAP
/*-----------------------------------------------------------------------------------*/

function wpts_gmap($atts, $content = null, $code) 
{
	
	wp_enqueue_script( 'gmap', get_template_directory_uri() . '/wpts/shortcodes/assets/js/jquery.gmap-1.1.0-min.js', array('jquery', 'gmap-api'), NULL );

	extract(shortcode_atts(array(
		"width" => 'auto',
		"height" => '400',
		"address" => 'Brazil',
		"zoom" => 10,
		"align" => false,
	), $atts));

	if($width && is_numeric($width)){
		if($width != 'auto') {
			$width = 'width:'.$width.'px;';
		}
		else
		{
			$width = 'width: auto;';
		}
	}else{
		$width = '';
	}
	if($height && is_numeric($height)){
		$height = 'height:'.$height.'px;';
	}else{
		$height = '';
	}
	
	$align = $align?' align'.$align:'';
	$id = rand(100,1000);

	return <<<HTML
	<div class="map_canvas align-{$align}" id="{$id}" style="{$width} {$height}"></div>
	<script type="text/javascript">
			// Google Map
			
			function initialize() {
				
				var geocoder;
				var map;
			
				geocoder = new google.maps.Geocoder();
				 var myOptions = {
					center: new google.maps.LatLng(0, 0),
					zoom: {$zoom},
					 mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				map = new google.maps.Map(document.getElementById("{$id}"),
					myOptions);
					
				var address = "{$address}";
				geocoder.geocode( { 'address': address}, function(results, status) {
				  if (status == google.maps.GeocoderStatus.OK) {
					map.setCenter(results[0].geometry.location);
					var marker = new google.maps.Marker({
						map: map,
						position: results[0].geometry.location
					});
				  } else {
					alert("Geocode was not successful for the following reason: " + status);
				  }
				});
			}
											
			initialize();
			  
	</script>
HTML;

}

add_shortcode('gmap','wpts_gmap');

/*-----------------------------------------------------------------------------------*/
/* [flex_slider] Display a Flex Slider
/*-----------------------------------------------------------------------------------*/

	
		
	

/*-----------------------------------------------------------------------------------*/
/* [gchart] Display a GoogleChart
/*-----------------------------------------------------------------------------------*/
	
function wpts_chart( $atts ) 
{
	extract(shortcode_atts(array(
	    'data' => '',
	    'colors' => '',
		'size' => '400x200',
	    'bg' => 'bg,s,ffffff',
	    'title' => '',
	    'labels' => '',
	    'advanced' => '',
	    'type' => 'pie'
	), $atts));
 
	switch ($type) {
		case 'line' :
			$charttype = 'lc'; break;
		case 'xyline' :
			$charttype = 'lxy'; break;
		case 'sparkline' :
			$charttype = 'ls'; break;
		case 'meter' :
			$charttype = 'gom'; break;
		case 'scatter' :
			$charttype = 's'; break;
		case 'venn' :
			$charttype = 'v'; break;
		case 'pie' :
			$charttype = 'p3'; break;
		case 'pie2d' :
			$charttype = 'p'; break;
		default :
			$charttype = $type;
		break;
	}
	
	$string = '';
	
	if ($title) $string .= '&chtt='.$title.'';
	if ($labels) $string .= '&chl='.$labels.'';
	if ($colors) $string .= '&chco='.$colors.'';
	$string .= '&chs='.$size.'';
	$string .= '&chd=t:'.$data.'';
	$string .= '&chf='.$bg.'';
 
	return '<img title="'.$title.'" src="http://chart.apis.google.com/chart?cht='.$charttype.''.$string.$advanced.'" alt="'.$title.'" />';
}

add_shortcode('chart', 'wpts_chart');

/*-----------------------------------------------------------------------------------*/
/* [sitemap] Display a SiteMap
/*-----------------------------------------------------------------------------------*/

function wpts_sitemap($atts, $content = null, $code) 
{
	if(isset($atts['type'])){
		switch($atts['type']){
			case 'pages':
				return sitemap_pages($atts);
			case 'posts':
				return sitemap_posts($atts);
			case 'categories':
				return sitemap_categories($atts);
			case 'all':
				return sitemap_all($atts);	
			default:
				return sitemap_all($atts);			
		}
	}
	return '';
}

add_shortcode('sitemap', 'wpts_sitemap');

function sitemap_pages($atts)
{
	extract(shortcode_atts(array(
		'number' => '0',
		'depth' => '0',
	), $atts));
	
	return '<ul>'.wp_list_pages('depth=0&sort_column=menu_order&echo=0&title_li=&depth='.$depth.'&number='.$number ).'</ul>';
}

function sitemap_categories($atts)
{
	extract(shortcode_atts(array(
		'number' => '0',
		'depth' => '0',
		'show_count' => true,
		'show_feed' => true,
	), $atts));
	
	if($show_count === 'false'){
		$show_count = false;
	}
	if($show_feed === true || $show_feed == 'true'){
		$feed = __( 'RSS' );
	}else{
		$feed = '';
	}

	$exclude_cats = '';
	return '<ul>'.wp_list_categories( array( 'feed' => $feed, 'show_count' => $show_count, 'use_desc_for_title' => false, 'title_li' => false, 'echo' => 0 ) ).'</ul>';
}

function sitemap_posts($atts){
	extract(shortcode_atts(array(
		'show_comment' => true,
		'number' => '0',
		'cat' => '',
		'posts' => '',
	), $atts));
	
	if($number == 0){
		$number = 1000;
	}
	if($show_comment === 'false'){
		$show_comment = false;
	}
	
	$query = array(
		'showposts' => (int)$number,
		'post_type'=>'post',
	);
	if($cat){
		$query['cat'] = $cat;
	}
	if($posts){
		$query['post__in'] = explode(',',$posts);
	}
	
	$archive_query = new WP_Query( $query );
	
	$output = '';
	while ($archive_query->have_posts()) : $archive_query->the_post();
		$output .= '<li><a href="'.get_permalink().'" rel="bookmark" title="'.sprintf( __("Permanent Link to %s"), get_the_title() ).'">'. get_the_title().'</a>'.($show_comment?' ('.get_comments_number().')':'').'</li>';
	endwhile;
	return '<ul>'.$output.'</ul>';
}

function sitemap_all($atts){
	extract(shortcode_atts(array(
		'number' => '0',
		'shows' => 'pages,categories,posts,portfolios',
	), $atts));
	
	$shows = explode(',', $shows);
	if(empty($shows)){
		return '';
	}
	
	$output = '';
	
	if(in_array('pages',$shows)){
		$output .= '<h2>'.__('Pages').'</h2>';
		$output .= sitemap_pages($atts);
		$output .= '<div class="divider top"><a href="#">'.__('Top').'</a></div> ';
	}
	if(in_array('categories',$shows)){
		$output .= '<h2>'.__('Category Archives').'</h2>';
		$output .= sitemap_categories($atts);
		$output .= '<div class="divider top"><a href="#">'.__('Top').'</a></div> ';
	}
	if(in_array('posts',$shows)){
		$output .= '<h2>'.__('Blog Posts').'</h2>';
		$output .= sitemap_posts($atts);
		$output .= '<div class="divider top"><a href="#">'.__('Top').'</a></div> ';
	}
	
	return $output;

}

/*-----------------------------------------------------------------------------------*/
/* [flickr] Display a Flickr Gallery
/*-----------------------------------------------------------------------------------*/

function wpts_flickr($atts) 
{
	extract(shortcode_atts(array(
		'id' => '',
		'type' => 'user',
		'count' => 4,
		'display' => 'latest'//lastest or random
	), $atts));
	
	return <<<HTML
<div class="flickr_wrap">
	<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count={$count}&amp;display={$display}&amp;size=s&amp;layout=x&amp;source={$type}&amp;{$type}={$id}"></script>
</div>
<div class="clearboth"></div>
HTML;
}
add_shortcode('flickr', 'wpts_flickr');

/*-----------------------------------------------------------------------------------*/
/* [popular_posts] Display a Popular Posts
/*-----------------------------------------------------------------------------------*/

function wpts_popular_posts($atts) 
{
	extract(shortcode_atts(array(
		'count' => '4',
		'thumbnail' => 'true',
		'extra' => 'desc',
		'cat' => '',
		'desc_length' => '80',
	), $atts));
	
	$query = array('showposts' => $count, 'nopaging' => 0, 'orderby'=> 'comment_count', 'post_status' => 'publish', 'ignore_sticky_posts' => 1);
	if($cat){
		$query['cat'] = $cat;
	}
	$r = new WP_Query($query);

	if ($r->have_posts()){
		$output = '<div class="popular_posts_wrap">';
		$output .= '<ul class="posts_list">';
		while ($r->have_posts()){
			$r->the_post();
			$output .= '<li>';
			if($thumbnail!='false'){
				$output .= '<a class="thumbnail" href="'.get_permalink().'" title="'.get_the_title().'">';
				if (has_post_thumbnail() ){
					$output .= get_the_post_thumbnail(get_the_ID(),array(65,65),array('title'=>get_the_title(),'alt'=>get_the_title()));
				}else{
					$output .= '<img src="'.get_template_directory_uri() .'/wpts/shortcodes/assets/widgets/widget_posts_thumbnail.png" width="65" height="65" title="'.get_the_title().'" alt="'. get_the_title().'"/>';
				}
				$output .= '</a>';
			}
			$output .= '<div class="post_extra_info">';
			$output .= '<a class="post_title" href="'.get_permalink().'" title="'.get_the_title().'" rel="bookmark">'.get_the_title().'</a>';
			if($extra=='time'){
				$output .= '<time datetime="'.get_the_time('Y-m-d').'">'.get_the_date().'</time>';
			}else{
				global $post;
				$excerpt = $post->post_excerpt;
				if($excerpt==''){
					$excerpt = get_the_content('');
				}
				$output .= '<p>'.do_shortcode(wp_html_excerpt($excerpt,$desc_length)).'...</p>';
			}
			$output .= '</div>';
			$output .= '<div class="clearboth"></div>';
			$output .= '</li>';
		}
		$output .= '</ul>';
		$output .= '</div>';
	} 
	wp_reset_query();
	return '[raw]'.$output.'[/raw]';
}
add_shortcode('popular_posts', 'wpts_popular_posts');

/*-----------------------------------------------------------------------------------*/
/* [recent_posts] Display a Recent Posts
/*-----------------------------------------------------------------------------------*/

function wpts_recent_posts($atts) 
{
	extract(shortcode_atts(array(
		'count' => '4',
		'thumbnail' => 'true',
		'extra' => 'desc',
		'cat' => '',
		'desc_length' => '80',
	), $atts));
	
	$query = array('showposts' => $count, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1);
	if($cat){
		$query['cat'] = $cat;
	}
	$r = new WP_Query($query);
	
	if ($r->have_posts()){
		$output = '<div class="popular_posts_wrap">';
		$output .= '<ul class="posts_list">';
		while ($r->have_posts()){
			$r->the_post();
			$output .= '<li>';
			if($thumbnail!='false'){
				$output .= '<a class="thumbnail" href="'.get_permalink().'" title="'.get_the_title().'">';
				if (has_post_thumbnail() ){
					$output .= get_the_post_thumbnail(get_the_ID(),array(65,65),array('title'=>get_the_title(),'alt'=>get_the_title()));
				}else{
					$output .= '<img src="'.get_template_directory_uri() .'/wpts/shortcodes/assets/widgets/widget_posts_thumbnail.png" width="65" height="65" title="'.get_the_title().'" alt="'. get_the_title().'"/>';
				}
				$output .= '</a>';
			}
			$output .= '<div class="post_extra_info">';
			$output .= '<a class="post_title" href="'.get_permalink().'" title="'.get_the_title().'" rel="bookmark">'.get_the_title().'</a>';
			if($extra=='time'){
				$output .= '<time datetime="'.get_the_time('Y-m-d').'">'.get_the_date().'</time>';
			}else{
				global $post;
				$excerpt = $post->post_excerpt;
				if($excerpt==''){
					$excerpt = do_shortcode(get_the_content(''));
				}
				$output .= '<p>'.wp_html_excerpt($excerpt,$desc_length).'...</p>';
			}
			$output .= '</div>';
			$output .= '<div class="clearboth"></div>';
			$output .= '</li>';
		}
		$output .= '</ul>';
		$output .= '</div>';
	} 
	wp_reset_query();
	return '[raw]'.$output.'[/raw]';
}
add_shortcode('recent_posts', 'wpts_recent_posts');

/*-----------------------------------------------------------------------------------*/
/* [color icon] Display a color icon in a img element
/*-----------------------------------------------------------------------------------*/

function wpts_color_icon($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'icon' => 'advanced',
		'vertical_align' => 'middle',
		'align' => '',
	), $atts));
	
	$style = '';
	if($vertical_align != '') {
		$style = 'style="vertical-align: '.$vertical_align.';"';
	}
	
	if($align != '') {
		$align = 'align-'.$align;
	}
	
	return '<img class="color-icon '.$align.'" '.$style.' src="'.get_template_directory_uri() .'/wpts/shortcodes/assets/images/color-icons/'.$icon.'.png" />';
}

add_shortcode('color_icon', 'wpts_color_icon');

/*-----------------------------------------------------------------------------------*/
/* [capty] Displays a Image with Capty Effect
/*-----------------------------------------------------------------------------------*/

function wpts_capty($atts, $content = null, $code) {

	wp_enqueue_script( 'jquery-capty', get_template_directory_uri() . '/wpts/shortcodes/assets/capty/js/jquery.capty.min.js', array('jquery'), NULL );
	
	wp_enqueue_script( 'jquery-capty-init', get_template_directory_uri() . '/wpts/shortcodes/assets/capty/js/capty-init.js', array('jquery'), NULL );
		
	wp_enqueue_style( 'jquery-capty-css', get_template_directory_uri() . '/wpts/shortcodes/assets/capty/css/jquery.capty.css', array(), NULL, 'all' );
	
	extract(shortcode_atts(array(
		'src' => '',
		'type' => 'default', // default | fixed
		'width' => 'auto',
		'height' => 'auto',
		'text' => ''
	), $atts));
		
	return '[raw]<img class="capty-'.$type.'" src="'.$src.'" alt="'.$text.'" width="'.$width.'" height="'.$height.'" />[/raw]';
}

add_shortcode('capty', 'wpts_capty');

/*-----------------------------------------------------------------------------------*/
/* [pre] & [code] Displays a code with pre or code tags
/*-----------------------------------------------------------------------------------*/

	global $wpts_code_token;
	$wpts_code_token = md5(uniqid(rand()));
	$wpts_code_matches = array();
	
	function wpts_code_before_filter($content) {
		return preg_replace_callback("/(.?)\[(pre|code)\b(.*?)(?:(\/))?\](?:(.+?)\[\/\\2\])?(.?)/s", "wpts_code_before_filter_callback", $content);
	}

	function wpts_code_before_filter_callback(&$match) {
		global $wpts_code_token, $wpts_code_matches;
		$i = count($wpts_code_matches);
		
		$wpts_code_matches[$i] = $match;
		
		return "\n\n<p>" . $wpts_code_token . sprintf("%03d", $i) . "</p>\n\n";
	}

	function wpts_code_after_filter($content) {
		global $wpts_code_token;
		
		$content = preg_replace_callback("/<p>\s*" . $wpts_code_token . "(\d{3})\s*<\/p>/si", "wpts_code_after_filter_callback", $content);
		
		return $content;
	}
	function wpts_code_after_filter_callback($match) {
		global $wpts_code_matches;
		$i = intval($match[1]);
		$content = $wpts_code_matches[$i];
		$content[5]=trim($content[5]);
		
		if (version_compare(PHP_VERSION, '5.2.3') >= 0) {
			$output = htmlspecialchars($content[5], ENT_NOQUOTES, get_bloginfo('charset'), false);
		} else {
			$specialChars = array('&' => '&amp;', '<' => '&lt;', '>' => '&gt;');
			
			$output = strtr(htmlspecialchars_decode($content[5]), $specialChars);
		}
		return '<' . $content[2] . ' class="'. $content[2] .'">' . $output . '</' . $content[2] . '>';
	}

	add_filter('the_content', 'wpts_code_before_filter', 0);
	add_filter('the_content', 'wpts_code_after_filter', 99);

?>