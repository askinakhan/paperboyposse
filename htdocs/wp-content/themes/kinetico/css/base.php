<?php

require_once( ABSPATH.'wp-load.php' );
require_once('csscolor.php');

$col = wpts_get_option('colors');
	
$skin = $col["color"];

if($skin == 'orange') {
	$basecolor = new CSS_Color('EE4E1D');
	$basecolor->bg['-1'] = 'e1481a';
}

if($skin == 'blue') {
	$basecolor = new CSS_Color('588eaa');
}

if($skin == 'pink') {
	$basecolor = new CSS_Color('e8426d');
}

if($skin == 'green') {
	$basecolor = new CSS_Color('9bc149');
}

if($skin == 'yellow') {
	$basecolor = new CSS_Color('feb70e');
	$basecolor->bg['-1'] = 'f1a115';
}

if($skin == 'dark') {
	$basecolor = new CSS_Color('777777');
}

if($skin == 'red') {
	$basecolor = new CSS_Color('db253a');
}


if($col['custom_color'] != '') {
	$basecolor = new CSS_Color($col['custom_color']);
}

$font = 'nevisBold';

if($col['use_cyrillic'] == true)
	$font = 'Francois One';

?>	

/*
* Skeleton V1.1
* Copyright 2011, Dave Gamache
* www.getskeleton.com
* Free to use under the MIT license.
* http://www.opensource.org/licenses/mit-license.php
* 8/17/2011
*/


/* Table of Content
==================================================
	#Reset & Basics
	#Basic Styles
	#Site Styles
	#Typography
	#Links
	#Lists
	#Images
	#Buttons
	#Tabs
	#Forms
	#Misc */


/* #Reset & Basics (Inspired by E. Meyers)
================================================== */
	html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video {
		margin: 0;
		padding: 0;
		border: 0;
		font-size: 100%;
		font: inherit;
		vertical-align: baseline; }
	article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section {
		display: block; }
	body {
		line-height: 1; }
	ol, ul {
		list-style: none; }
	blockquote, q {
		quotes: none; }
	blockquote:before, blockquote:after,
	q:before, q:after {
		content: '';
		content: none; }
	table {
		border-collapse: collapse;
		border-spacing: 0; }


/* #Basic Styles
================================================== */
	body {
		background: #fff;
		font: 14px/21px "Helvetica", "HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif;
		color: #444;
		-webkit-font-smoothing: antialiased; /* Fix for webkit rendering */
		-webkit-text-size-adjust: 100%;
 }


/* #Typography
================================================== */
	h1, h2, h3, h4, h5, h6 {
		color: #383936;
		font-family: "Helvetica", "HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif;
		 }
	h1 a, h2 a, h3 a, h4 a, h5 a, h6 a { font-weight: inherit; }
	h1 { font-size: 46px; line-height: 50px; margin-bottom: 14px;}
	h2 { font-size: 35px; line-height: 40px; margin-bottom: 10px; }
	h3 { font-size: 28px; line-height: 34px; margin-bottom: 8px; }
	h4 { font-size: 21px; line-height: 30px; margin-bottom: 4px; }
	h5 { font-size: 17px; line-height: 24px; margin-bottom: 8px; }
	h6 { font-size: 14px; line-height: 21px; margin-bottom: 4px; }
	.subheader { color: #777; }

	p { margin: 0 0 20px 0; }
	p img { margin: 0; }
	p.lead { font-size: 21px; line-height: 27px; color: #777;  }

	em { font-style: italic; }
	strong { font-weight: bold; color: #333; }
	small { font-size: 80%; }

/*	Blockquotes  */
	blockquote, blockquote p { font-size: 20px; line-height: 24px; color: #74726a; font-style: italic; font-family: "Droid Serif", "Georgia", serif; }
	blockquote { margin: 0 0 20px 50px; padding: 9px 20px 0 19px;  padding-left: 20px; border-left: 1px dotted #ccc; }
	blockquote cite { display: block; font-size: 12px; color: #555; }
	blockquote cite:before { content: "\2014 \0020"; }
	blockquote cite a, blockquote cite a:visited, blockquote cite a:visited { color: #555; }

	blockquote

	hr { border: solid #ddd; border-width: 1px 0 0; clear: both; margin: 10px 0 30px; height: 0; }


/* #Links
================================================== */
	a, a:visited { color: #333; text-decoration: underline; outline: 0; }
	a:hover, a:focus { color: #000; 
		-webkit-transition: color 0.3s ease-in;
		-moz-transition: color 0.3s ease-in;
        -ms-transition: color 0.3s ease-in;
        -o-transition: color 0.3s ease-in;
		transition: color 0.3s ease-in; 
	}
	p a, p a:visited { line-height: inherit; }


/* #Lists
================================================== */
	ul, ol { margin-bottom: 20px; }
	ul { list-style: none outside; }
	ol { list-style: decimal; }
	ol, ul.square, ul.circle, ul.disc { margin-left: 30px; }
	ul.square { list-style: square outside; }
	ul.circle { list-style: circle outside; }
	ul.disc { list-style: disc outside; }
	ul ul, ul ol,
	ol ol, ol ul { margin: 4px 0 5px 30px; font-size: 90%;  }
	ul ul li, ul ol li,
	ol ol li, ol ul li { margin-bottom: 6px; }
	li { line-height: 18px; margin-bottom: 12px; }
	ul.large li { line-height: 21px; }
	li p { line-height: 21px; }

/* #Images
================================================== */

	img.scale-with-grid {
		max-width: 100%;
		height: auto; }


/* #Buttons
================================================== */

	a.button,
	button,
	input[type="submit"],
	input[type="reset"],
	input[type="button"] {
	
	  background: #<?php echo $basecolor->bg['0']; ?>;
	  background: -moz-linear-gradient(top,  #<?php echo $basecolor->bg['+3']; ?> 0%, #<?php echo $basecolor->bg['+3']; ?> 4%, #<?php echo $basecolor->bg['0']; ?> 5%, #<?php echo $basecolor->bg['-1']; ?> 99%);
	  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#<?php echo $basecolor->bg['+3']; ?>), color-stop(4%,#<?php echo $basecolor->bg['+3']; ?>), color-stop(5%,#<?php echo $basecolor->bg['0']; ?>), color-stop(99%,#<?php echo $basecolor->bg['-1']; ?>));
	  background: -webkit-linear-gradient(top,  #<?php echo $basecolor->bg['+3']; ?> 0%,#<?php echo $basecolor->bg['+3']; ?> 4%,#<?php echo $basecolor->bg['0']; ?> 5%,#<?php echo $basecolor->bg['-1']; ?> 99%);
	  background: -o-linear-gradient(top,  #<?php echo $basecolor->bg['+3']; ?> 0%,#<?php echo $basecolor->bg['+3']; ?> 4%,#<?php echo $basecolor->bg['0']; ?> 5%,#<?php echo $basecolor->bg['-1']; ?> 99%);
	  background: -ms-linear-gradient(top,  #<?php echo $basecolor->bg['+3']; ?> 0%,#<?php echo $basecolor->bg['+3']; ?> 4%,#<?php echo $basecolor->bg['0']; ?> 5%,#<?php echo $basecolor->bg['-1']; ?> 99%);
	  background: linear-gradient(top,  #<?php echo $basecolor->bg['+3']; ?> 0%,#<?php echo $basecolor->bg['+3']; ?> 4%,#<?php echo $basecolor->bg['0']; ?> 5%,#<?php echo $basecolor->bg['-1']; ?> 99%);
	  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#<?php echo $basecolor->bg['+3']; ?>', endColorstr='#<?php echo $basecolor->bg['-1']; ?>',GradientType=0 );


	  border: 1px solid #<?php echo $basecolor->bg['0']; ?>;

	  padding: 11px 15px;
	  -moz-border-radius: 5px;
	  -webkit-border-radius: 5px;
	  border-radius: 5px;
	  color: #ffffff !important;
	  display: inline-block;
	  font-size: 18px;
	  text-decoration: none;
	  text-shadow: 0 1px rgba(0, 0, 0, .3);
	  cursor: pointer;
	  margin-bottom: 20px;
	  line-height: 21px;
	  font-family: "Helvetica", "HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif; 
	}

	button, input[type="submit"],
	input[type="reset"],
	input[type="button"] {
		-moz-padding: 9px 15px;
	}

	a.button:hover,
	button:hover {
		text-decoration: none !important;
	}

	a.button:active,
	button:active {
		 color: #ffffff !important;
	}

	.button.full-width,
	button.full-width,
	input[type="submit"].full-width,
	input[type="reset"].full-width,
	input[type="button"].full-width {
		width: 100%;
		padding-left: 0 !important;
		padding-right: 0 !important;
		text-align: center; }

	a.button:hover,
	button:hover,
	input[type="submit"]:hover,
	input[type="reset"]:hover,
	input[type="button"]:hover,
	.top-shop .categories .product-drop:hover {
	
	  background: #<?php echo $basecolor->bg['0']; ?>;
	  background: -moz-linear-gradient(top,  #<?php echo $basecolor->bg['+3']; ?> 0%, #<?php echo $basecolor->bg['+3']; ?> 4%, #<?php echo $basecolor->bg['+1']; ?> 5%, #<?php echo $basecolor->bg['0']; ?> 99%);
	  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#<?php echo $basecolor->bg['+3']; ?>), color-stop(4%,#<?php echo $basecolor->bg['+3']; ?>), color-stop(5%,#<?php echo $basecolor->bg['+1']; ?>), color-stop(99%,#<?php echo $basecolor->bg['0']; ?>));
	  background: -webkit-linear-gradient(top,  #<?php echo $basecolor->bg['+3']; ?> 0%,#<?php echo $basecolor->bg['+3']; ?> 4%,#<?php echo $basecolor->bg['+1']; ?> 5%,#<?php echo $basecolor->bg['0']; ?> 99%);
	  background: -o-linear-gradient(top,  #<?php echo $basecolor->bg['+3']; ?> 0%,#<?php echo $basecolor->bg['+3']; ?> 4%,#<?php echo $basecolor->bg['+1']; ?> 5%,#<?php echo $basecolor->bg['0']; ?> 99%);
	  background: -ms-linear-gradient(top,  #<?php echo $basecolor->bg['+3']; ?> 0%,#<?php echo $basecolor->bg['+3']; ?> 4%,#<?php echo $basecolor->bg['+1']; ?> 5%,#<?php echo $basecolor->bg['0']; ?> 99%);
	  background: linear-gradient(top,  #<?php echo $basecolor->bg['+3']; ?> 0%,#<?php echo $basecolor->bg['+3']; ?> 4%,#<?php echo $basecolor->bg['+1']; ?> 5%,#<?php echo $basecolor->bg['0']; ?> 99%);
	  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#<?php echo $basecolor->bg['+3']; ?>', endColorstr='#<?php echo $basecolor->bg['0']; ?>',GradientType=0 );

	}

	.content .dark {
	  border: 1px solid #2f2f2e !important;
	  background: #2f2f2e !important;
	  background: -moz-linear-gradient(top,  #757674 0%, #757674 4%, #444542 5%, #2f2f2e 99%) !important;
	  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#757674), color-stop(4%,#757674), color-stop(5%,#444542), color-stop(99%,#2f2f2e)) !important;
	  background: -webkit-linear-gradient(top,  #757674 0%,#757674 4%,#444542 5%,#2f2f2e 99%) !important;
	  background: -o-linear-gradient(top,  #757674 0%,#757674 4%,#444542 5%,#2f2f2e 99%) !important;
	  background: -ms-linear-gradient(top,  #757674 0%,#757674 4%,#444542 5%,#2f2f2e 99%) !important;
	  background: linear-gradient(top,  #757674 0%,#757674 4%,#444542 5%,#2f2f2e 99%) !important;
	  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#757674', endColorstr='#2f2f2e',GradientType=0 ) !important;
	}

	.content .dark:hover
    {
	
	  background: #40403f !important;
	  background: -moz-linear-gradient(top,  #757674 0%, #757674 4%, #5e5e5d 5%, #40403f 99%) !important;
	  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#757674), color-stop(4%,#757674), color-stop(5%,#5e5e5d), color-stop(99%,#40403f)) !important;
	  background: -webkit-linear-gradient(top,  #757674 0%,#757674 4%,#5e5e5d 5%,#40403f 99%) !important;
	  background: -o-linear-gradient(top,  #757674 0%,#757674 4%,#5e5e5d 5%,#40403f 99%) !important;
	  background: -ms-linear-gradient(top,  #757674 0%,#757674 4%,#5e5e5d 5%,#40403f 99%) !important;
	  background: linear-gradient(top,  #757674 0%,#757674 4%,#5e5e5d 5%,#40403f 99%) !important;
	  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#757674', endColorstr='#40403f',GradientType=0 ) !important;
	}

	.content .gray {
	  border: 1px solid #b5b4b4 !important;
	  background: #cacaca !important;
	  background: -moz-linear-gradient(top,  #e6e6e6 0%, #e6e6e6 4%, #dcdcdc 5%, #cacaca 99%) !important;
	  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#e6e6e6), color-stop(4%,#e6e6e6), color-stop(5%,#dcdcdc), color-stop(99%,#cacaca)) !important;
	  background: -webkit-linear-gradient(top,  #e6e6e6 0%,#e6e6e6 4%,#dcdcdc 5%,#cacaca 99%) !important;
	  background: -o-linear-gradient(top,  #e6e6e6 0%,#e6e6e6 4%,#dcdcdc 5%,#cacaca 99%) !important;
	  background: -ms-linear-gradient(top,  #e6e6e6 0%,#e6e6e6 4%,#dcdcdc 5%,#cacaca 99%) !important;
	  background: linear-gradient(top,  #e6e6e6 0%,#e6e6e6 4%,#dcdcdc 5%,#cacaca 99%) !important;
	  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e6e6e6', endColorstr='#cacaca',GradientType=0 ) !important;
	  color: #515151 !important;
	  text-shadow: 0 1px 0 #fff;
	}

	.content .gray:hover
    {
	
	  background: #dedede !important;
	  background: -moz-linear-gradient(top,  #efefef 0%, #efefef 4%, #e9e9e9 5%, #dedede 99%) !important;
	  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#efefef), color-stop(4%,#efefef), color-stop(5%,#e9e9e9), color-stop(99%,#dedede)) !important;
	  background: -webkit-linear-gradient(top,  #efefef 0%,#efefef 4%,#e9e9e9 5%,#dedede 99%) !important;
	  background: -o-linear-gradient(top,  #efefef 0%,#efefef 4%,#e9e9e9 5%,#dedede 99%) !important;
	  background: -ms-linear-gradient(top,  #efefef 0%,#efefef 4%,#e9e9e9 5%,#dedede 99%) !important;
	  background: linear-gradient(top,  #efefef 0%,#efefef 4%,#e9e9e9 5%,#dedede 99%) !important;
	  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#efefef', endColorstr='#dedede',GradientType=0 ) !important;
	}

	.content .blue {
	  border: 1px solid #71a0ac !important;
	  background: #71a0ac !important;
	  background: -moz-linear-gradient(top,  #bbd2d7 0%, #bbd2d7 4%, #a1c0c9 5%, #71a0ac 99%) !important;
	  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#bbd2d7), color-stop(4%,#bbd2d7), color-stop(5%,#a1c0c9), color-stop(99%,#71a0ac)) !important;
	  background: -webkit-linear-gradient(top,  #bbd2d7 0%,#bbd2d7 4%,#a1c0c9 5%,#71a0ac 99%) !important;
	  background: -o-linear-gradient(top,  #bbd2d7 0%,#bbd2d7 4%,#a1c0c9 5%,#71a0ac 99%) !important;
	  background: -ms-linear-gradient(top,  #bbd2d7 0%,#bbd2d7 4%,#a1c0c9 5%,#71a0ac 99%) !important;
	  background: linear-gradient(top,  #bbd2d7 0%,#bbd2d7 4%,#a1c0c9 5%,#71a0ac 99%) !important;
	  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#bbd2d7', endColorstr='#71a0ac',GradientType=0 ) !important;
	}

	.content .blue:hover
    {
	
	  background: #71a0ac !important;
	  background: -moz-linear-gradient(top,  #bbd2d7 0%, #bbd2d7 4%, #a4c9d2 5%, #71a0ac 99%) !important;
	  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#bbd2d7), color-stop(4%,#bbd2d7), color-stop(5%,#a4c9d2), color-stop(99%,#71a0ac)) !important;
	  background: -webkit-linear-gradient(top,  #bbd2d7 0%,#bbd2d7 4%,#a4c9d2 5%,#71a0ac 99%) !important;
	  background: -o-linear-gradient(top,  #bbd2d7 0%,#bbd2d7 4%,#a4c9d2 5%,#71a0ac 99%) !important;
	  background: -ms-linear-gradient(top,  #bbd2d7 0%,#bbd2d7 4%,#a4c9d2 5%,#71a0ac 99%) !important;
	  background: linear-gradient(top,  #bbd2d7 0%,#bbd2d7 4%,#a4c9d2 5%,#71a0ac 99%) !important;
	  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#bbd2d7', endColorstr='#71a0ac',GradientType=0 ) !important;
	}





/* #Tabs (activate in tabs.js)
================================================== */
	ul.tabs {
		display: block;
		margin: 0 0 20px 0;
		padding: 0;
	 }
	ul.tabs li {
		display: inline-block;
		width: auto;
		padding: 0;
		margin-right: 20px;
		margin-bottom: 0; }

	ul.tabs li:last-child {
		margin-right: 0;
	}

	ul.tabs li a {
		display: block;
		text-decoration: none;
		width: auto;
		padding: 0px 20px;
		line-height: 30px;
		margin: 0;
		font-size: 13px; 
		color: #a6a6a6;
		font-weight: bold;
		-moz-border-radius: 10px;
		-webkit-border-radius: 10px;
    	border-radius: 10px;
	}

	ul.tabs li.active a {
		background: #ececeb;
		position: relative;
		margin: 0 0 0 -1px;
		color: #525351 !important;
	}

	ul.tabs li:first-child a.active {
		margin-left: 0; }
	
	ul.tabs-content { margin: 0; display: block; }
	ul.tabs-content > li { display:none; }
	ul.tabs-content > li.active { display: block; }

	/* Clearfixing tabs for beautiful stacking */
	ul.tabs:before,
	ul.tabs:after {
	  content: '\0020';
	  display: block;
	  overflow: hidden;
	  visibility: hidden;
	  width: 0;
	  height: 0; }
	ul.tabs:after {
	  clear: both; }
	ul.tabs {
	  zoom: 1; }


/* #Forms
================================================== */

	form {
		margin-bottom: 20px; }
	fieldset {
		margin-bottom: 20px; }
	input[type="text"],
	input[type="password"],
	input[type="email"],
	textarea,
	select {
		border: 1px solid #ccc;
		padding: 6px 4px;
		outline: none;
		-moz-border-radius: 2px;
		-webkit-border-radius: 2px;
		border-radius: 2px;
		font: 13px "HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif;
		font-style: italic;
		color: #777;
		margin: 0;
		width: 210px;
		max-width: 100%;
		display: block;
		margin-bottom: 20px;
		background: #fff;
		
		-webkit-box-sizing: border-box; /* Safari/Chrome, other WebKit */
		-moz-box-sizing: border-box;    /* Firefox, other Gecko */
		box-sizing: border-box;         /* Opera/IE 8+ */

		padding: 15px 10px;
		width: 100%;

		position: relative;
		top: -2px;

		}

	select {

	}

	input[type="text"]:focus,
	input[type="password"]:focus,
	input[type="email"]:focus,
	textarea:focus {
		border: 1px solid #aaa;
 		color: #444;
 	}
	textarea {
		min-height: 80px; }
	label,
	legend {
		display: block;
		font-weight: bold;
		font-size: 13px;  }

	input[type="checkbox"] {
		display: inline; }
	label span,
	legend span {
		font-weight: normal;
		font-size: 13px;
		color: #444; }

/* #Misc
================================================== */
	.remove-bottom { margin-bottom: 0 !important; }
	.half-bottom { margin-bottom: 10px !important; }
	.add-bottom { margin-bottom: 20px !important; }
	
	.entry-content img {
		margin: 0 0 1.5em 0;
	}
	.alignleft, img.alignleft {
		margin-right: 1.5em;
		display: inline;
		float: left;
		}
	.alignright, img.alignright {
		margin-left: 1.5em;
		display: inline;
		float: right;
		}
	.aligncenter, img.aligncenter {
		margin-right: auto;
		margin-left: auto;
		display: block;
		clear: both;
		}
	.alignnone, img.alignnone {
		/* not sure about this one */
		}
	.wp-caption {
		margin-bottom: 1.5em;
		text-align: center;
		padding-top: 5px;
		border: 1px solid #ececec;
		padding-bottom: 15px;
		border: 1px solid #e8e5dc;
		-webkit-box-shadow:  0px 0px 1px 0px rgba(0, 0, 0, 0.2);
        -moz-box-shadow:  0px 0px 1px 0px rgba(0, 0, 0, 0.2);
        box-shadow:  0px 0px 1px 0px rgba(0, 0, 0, 0.2);  
        background-color: #ffffff; 
        background-image: url(../images/product_detail.png);
        background-repeat: no-repeat;
        background-position: bottom left;
		}
	.wp-caption img {
		border: 0 none;
		padding: 0;
		margin: 0;
		}
	.wp-caption p.wp-caption-text {
		line-height: 1.5;
		font-size: 14px;
		margin: 0;
		padding: 10px 20px;
		padding-bottom: 5px;
		text-align: left;
		font-weight: bold;
		}
	.wp-smiley {
		margin: 0 !important;
		max-height: 1em;
		}
	blockquote.left {
		margin-right: 20px;
		text-align: right;
		margin-left: 0;
		width: 33%;
		float: left;
		}
	blockquote.right {
		margin-left: 20px;
		text-align: left;
		margin-right: 0;
		width: 33%;
		float: right;
		}
	.gallery dl {}
	.gallery dt {}
	.gallery dd {}
	.gallery dl a {}
	.gallery dl img {}
	.gallery-caption {}

	.size-full {}
	.size-large {}
	.size-medium {}
	.size-thumbnail {}

	.sticky, .byauthorpost {

	}

	.bypostauthor {

	}

/***********************************************
	BODY
/**********************************************/

	html {
		<?php if($col["is_full"] == true) : ?>

			<?php
			$bg = '../images/patterns/'.$col["pattern"].'.png';

			if($col['custom_background'] != '')
				$bg = $col['custom_background'];
			?>

			background: url('<?php echo $bg; ?>') no-repeat center center fixed; 
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
			filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $bg; ?>', sizingMethod='scale');
			-ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $bg; ?>', sizingMethod='scale')";
		<?php endif; ?>
	}

	body {

		<?php if($col["is_full"] == false) : ?>

			background-color: #<?php echo $col['custom_background_color']; ?>;

			<?php if($col['use_color'] == false) : ?>

				<?php
				$bg = '../images/patterns/'.$col["pattern"].'.png';

				if($col['custom_background'] != '')
					$bg = $col['custom_background'];
				?>
				background-image: url('<?php echo $bg; ?>');

			<?php endif; ?>

		<?php else : ?>

			background-color: transparent;

		<?php endif; ?>
	}
	
	.background {        
        -webkit-box-shadow:  0px 0px 5px 2px rgba(0, 0, 0, 0.2);
        -moz-box-shadow:  0px 0px 5px 2px rgba(0, 0, 0, 0.2);
        box-shadow:  0px 0px 5px 2px rgba(0, 0, 0, 0.2);   
	}
	
/***********************************************
	BASIC STRUCTURE
/**********************************************/

	.background {
		background-color: #f8f8f2;
	}
	
	#top {
		background-color: #383936;
	}
	
	#header {
		background-color: #<?php echo $basecolor->bg['0']; ?>;
	}
	
	.big-header {
		background-color: #ffffff;
	}
	
	.footer {
		background-color: #222221;
		;
	}
	
	.down-footer {
		background-color: #<?php echo $basecolor->bg['0']; ?>;
	}
	
/***********************************************
	TOP
/**********************************************/
	
	#top {
	
	}
	
	#top .top-menu {
		padding-right: 200px;
		height: 40px;
	}
	
	#top .top-menu ul {
		font-family: "Helvetica", Arial, sans-serif;
		font-weight: bold;
		margin: 0;
		float: right;
		margin-right: 20px;
	}
	
	#top .top-menu ul li {
		display: inline-block;
		margin: 0;
		font-size: 14px;
		line-height: 40px;
		margin-right: 30px;
	}
	
	#top .top-menu ul li:last-child {
		margin-right: 0;
	}
	
	#top .top-menu ul li a, #top .top-menu ul li a:visited {
		color: #949393;
		text-decoration: none;
		text-shadow: 1px 1px rgba(0,0,0,0.2);
	}
	
	#top .top-menu ul li a:hover {
		color: #ffffff;
	}
	
	#top .cart-status {
		float: right;
		background-color: #2f2f2e;
		padding-right: 50px;
		width: 140px;
		height: 40px;
		line-height: 40px;
		color: #949393;
		font-family: "Helvetica", Arial, sans-serif;
		font-weight: normal;
		text-shadow: 1px 1px rgba(0,0,0,0.2);
		font-size: 14px;
		text-align: right;
	}
	
	#top .cart-status a {
		font-weight: bold;
		color: #ffffff;
		padding-right: 5px;
		padding-left: 30px;
		background: url("../images/shop_cart_icon.png") no-repeat center left;
		display: inline-block;
		text-decoration: none;
	}

	#top .cart-status a:hover {
		color: #ffffff;
	}
	
	
/***********************************************
	HEADER
/**********************************************/

	#header {
		border-top: 1px solid #<?php echo $basecolor->bg['+3']; ?>;
		padding-top: 15px;
		padding-bottom: 15px;
	}
	
	#header .logo {
		width: 220px;
		height: 82px;
		float: left;
	}
	
	#header .logo a{
		display: block;
	}
	
	#header .main-menu {
		
		padding-left: 230px;
	}
	
	#header .main-menu ul {
		float: right;
		margin: 0;
		padding-top: 32px;
	}
	
	#header .main-menu ul li {
		display: inline-block;
		margin: 0;
		margin-right: 45px;
		font-family: '<?php echo $font; ?>';
		font-size: 16px;
		text-transform: uppercase;
		position: relative;
	}
	
	#header .main-menu ul li:last-child {
		margin-right: 0;
	}
	
	#header .main-menu ul li a {
		color: #ffffff;
		text-decoration: none;
		padding-bottom: 45px;
	}
	
	#header .main-menu ul li a:hover {
		color: #<?php echo $basecolor->bg['-3']; ?>;
	}


	
	#header .main-menu ul li .sub-menu {
		position: absolute;
		width: 200px;
		background-color: #<?php echo $basecolor->bg['-2']; ?>;
		z-index: 9999;
		padding: 15px 25px;
		left: 0;
		top: 65px;
		display: none;
		left: -25px;
	}

	#header .main-menu ul li:hover .sub-menu {
		display: block;
	}

	#header .main-menu ul li ul li {
		padding: 10px 0;
		margin: 0;
		font-size: 14px;
		line-height: 18px;
		display: block;
	}

	#header .main-menu ul li ul li a {
		padding: 0;
	}

	#header .main-menu ul li:hover .sub-menu {
		display: block;
	}

	#header .main-menu ul li .sub-menu:after, #header .main-menu ul li .sub-menu:before {
		bottom: 100%;
		border: solid transparent;
		content: " ";
		height: 0;
		width: 0;
		position: absolute;
		pointer-events: none;
	}

	#header .main-menu ul li .sub-menu:after {
		border-bottom-color: #<?php echo $basecolor->bg['-2']; ?>;
		border-width: 15px;
		left: 20%;
		margin-left: -15px;
	}

	#header .main-menu ul li .sub-menu:before {
		border-bottom-color: #<?php echo $basecolor->bg['-2']; ?>;
		border-width: 16px;
		left: 20%;
		margin-left: -16px;
	}

	/** THIRD LEVEL MENU **/

	#header .main-menu ul li .sub-menu li {
		position: relative;
	}

	#header .main-menu ul li .sub-menu .sub-menu {
		position: absolute;
		width: 200px;
		background-color: #<?php echo $basecolor->bg['-3']; ?>;
		z-index: 9999;
		padding: 15px 25px;
		left: 200px;
		top: -15px;
		display: none;
	}

	#header .main-menu ul .sub-menu li:hover .sub-menu {
		display: block;
	}

	#header .main-menu ul li .sub-menu .sub-menu:after, #header .main-menu ul li .sub-menu .sub-menu:before {
		border: solid transparent;
		content: " ";
		height: 0;
		width: 0;
		position: static;
		pointer-events: none;
	}

	#header .main-menu ul li .sub-menu .sub-menu:after {
		border-bottom-color: none;
		border-width: 0;
		margin-left: 0;
	}

	#header .main-menu ul li .sub-menu .sub-menu:before {
		border-bottom-color: none;
		border-width: 0;
		left: 0;
		margin-left: 0;
	}

	#header .main-menu ul li .sub-menu .sub-menu li a:hover {
		color: #<?php echo $basecolor->bg['-4']; ?>;
	}
	
/***********************************************
	BIG HEADER
/**********************************************/

	.big-header {
		position: relative;
		background: #ffffff;
		border-bottom: 1px solid #f0ece5;
		margin-bottom: 50px;
	}
	
	.big-header:after, .big-header:before {
		top: 100%;
		border: solid transparent;
		content: " ";
		height: 0;
		width: 0;
		position: absolute;
		pointer-events: none;
	}

	.big-header:after {
		border-top-color: #ffffff;
		border-width: 20px;
		left: 10%;
		margin-left: -20px;
	}
	.big-header:before {
		border-top-color: #f0ece5;
		border-width: 21px;
		left: 10%;
		margin-left: -21px;
	}
	
	#wrapper .big-header {
		padding-top: 20px; 
		padding-bottom: 20px; 
	}
	
	.big-header h1 {
		margin: 0;
		color: #383936;
		font-family: '<?php echo $font; ?>';
		font-size: 35px;
		text-transform: uppercase;
		width: auto;
		height: auto;
		display: inline-block;
		word-wrap: break-word;
	}
	
	.big-header p {
		margin: 0;
		width: auto;
		height: auto;
		display: inline-block;
		color: #a4a4a4;
		font-family: "Droid Serif", sans-serif;
		font-style: italic;
		padding-left: 20px;
		position: relative;
		top: -7px;
	}
	
/***********************************************
	FOOTER
/**********************************************/

	#wrapper .footer {
		padding-top: 20px; 
		padding-bottom: 20px;
		font-size: 13px;
	}
	
	#wrapper .footer .widget p:last-child, #wrapper .footer .widget li:last-child {
		margin-bottom: 0;
	}

	#wrapper .footer .widget, #wrapper .footer .widget li {
		font-size: 13px;
	}
	
	#wrapper .footer p, #wrapper .footer li {
		color: #adadad;
		line-height: 18px;
		font-size: 12px;
		font-family: "Helvetica", Arial, sans-serif;
	}

	.footer .widgets-ul {
		margin-bottom: 0;
	}

	.footer .widgets-ul ul {
		margin: 0;
	}

	.footer .first-ul-widget {
		padding-left: 5px;
	}

/***********************************************
	DOWN FOOTER
/**********************************************/

	#wrapper .down-footer {
		margin: 15px 0;
		display: inline-block;
	}
	
	#wrapper .down-footer p {
		margin-bottom: 0;
		display: inline-block;
		color: #ffffff;
		font-family: '<?php echo $font; ?>';
		font-size: 12px;
		text-transform: uppercase;
	}
	
	#wrapper .down-footer p a {
		text-decoration: none;
		color: #<?php echo $basecolor->bg['-2']; ?>;
	}
	
	#wrapper .down-footer {
		padding: 8px 15px;
	}
	
/***********************************************
	BLOG
/**********************************************/

	.content-side {
		width: 621px;
		background-color: #ffffff;
		margin-right: 15px;
		float: left;
		-webkit-box-shadow:  0px 1px 3px 1px rgba(0, 0, 0, 0.1);
        -moz-box-shadow:  0px 1px 3px 1px rgba(0, 0, 0, 0.1);
        box-shadow:  0px 1px 3px 1px rgba(0, 0, 0, 0.1);
		margin-bottom: 50px;
	}

	.content-full {
		width: 940px;
		background-color: #ffffff;
		-webkit-box-shadow:  0px 1px 3px 1px rgba(0, 0, 0, 0.1);
        -moz-box-shadow:  0px 1px 3px 1px rgba(0, 0, 0, 0.1);
        box-shadow:  0px 1px 3px 1px rgba(0, 0, 0, 0.1);
		margin-bottom: 50px;
	}


	.content-full .post .post-block {
		padding: 15px 15px 25px;
	}

	.content-woo {
		width: 940px;
		background-color: transparent;
		-webkit-box-shadow:  none;
        -moz-box-shadow:  none;
        box-shadow:  none;
		margin-bottom: 50px;
	}

	.post {
		
	}
	
	.post .thumbnail { }
	
	.post .thumbnail a { display: block; }
	
	.post .thumbnail img { display: block; }
	
	.post .post-header {
	
	}
	
	.post .post-block {
		padding-bottom: 60px;
		/*border-left: 1px solid #e6e5e2;
		border-right: 1px solid #e6e5e2;*/
		padding: 25px 20px 60px 25px;
	}
	
	.post .post-header {
	
	}
	
	.post .post-header .post-date {
		text-align: center;
		background-color: #<?php echo $basecolor->bg['0']; ?>;
		width: 50px;
		height: 50px;
		float: left;
		font-family: "Helvetica", Arial, sans-serif;
		font-size: 20px;
		font-weight: bold;
		color: #ffffff;
		text-shadow: 0 1px rgba(0,0,0,0.4);
	}
	
	.post .post-header .post-date span.month {
		text-transform: uppercase;
		color: #fff;
		font-size: 10px;
		display: block;
		position: relative;
		top: 4px;
		font-weight: normal;
	}	
		
	.post .post-header .post-date span.day {
		position: relative;
		top: -2px;
	}

	.post .post-header .post-title {
		margin-left: 65px;
	}

	.post .post-header .post-title h1 {
		color: #383936;
		font-size: 18px;
		line-height: 22px;
		font-weight: normal;
		padding-top: 5px;
		margin-bottom: 0px;
	}

	.post .post-header .post-title h1 a {
		text-decoration: none;
		color: #383936;
	}

	.post .post-header .post-title p {
		font-family: "Droid Serif", "Georgia", serif;
		color: #a4a4a4;
		font-size: 11px;
		font-style: italic;

	}

	.post .post-header .post-title p a {
		color: #<?php echo $basecolor->bg['0']; ?>;
		text-decoration: none;
	}

	/**************************
	POST CONTENT STYLES
	**************************/

	.post .post-content {
		font-size: 13px;
	}

	.post .post-content a {
		color: #<?php echo $basecolor->bg['0']; ?>;
		text-decoration: none;
	}

	.post .post-content a:hover {
		text-decoration: underline;
	}

	.post .post-content p {
		color: #525351;
		font-size: 13px;
	}

	.post .post-content .read-more {
		color: #<?php echo $basecolor->bg['0']; ?>;
		text-align: right;
		padding-right: 10px;
	}

	.post .post-content .read-more a {
		color: #<?php echo $basecolor->bg['0']; ?>;
		text-decoration: none;
		font-style: italic;
	}

	.post .post-content .read-more a:hover {
		border-bottom: 1px solid #<?php echo $basecolor->bg['0']; ?>;
	}

	.post .post-content img {
		max-width: 100%;
		height: auto;
	}

	.post-content h1, 
	.post-content h2, 
	.post-content h3, 
	.post-content h4, 
	.post-content h5, 
	.post-content h6 {
	}
	
	.pagination {
		position: relative;
		margin: 0 25px 30px 25px;
		height: 40px;
	}

	.woocommerce-page .pagination {
		margin: 0 45px 30px 45px;
	}
	
	.pagination .numbers {
		position: absolute;
		left: 0;
		top: 0;
	}

	.pagination .numbers a {
		display: inline-block;
		margin-right: 5px;
		width: 40px;
		height: 40px;
		background-color: #3d3d3d;
		line-height: 40px;
		text-align: center;
		color: #ffffff;
		text-decoration: none;
		font-size: 18px;
		font-family: "Droid Serif", serif;
		font-style: italic;
		-moz-border-radius: 3px;
		-webkit-border-radius: 3px;
		border-radius: 3px;
		outline: none;
	}

	.pagination .numbers a:hover, .pagination .numbers a.active {
		background-color: #<?php echo $basecolor->bg['0']; ?>;
		-webkit-transition: background-color 0.3s ease-in;
		-moz-transition: background-color 0.3s ease-in;
        -ms-transition: background-color 0.3s ease-in;
        -o-transition: background-color 0.3s ease-in;
		transition: background-color 0.3s ease-in; 
	}
	
	.pagination .nav-buttons {
		position: absolute;
		right: 0;
		top: 0;
	}

	.pagination .nav-buttons a {
		display: inline-block;
		margin-right: 5px;
		width: 40px;
		height: 40px;
		background-color: #3d3d3d;
		line-height: 40px;
		text-align: center;
		color: #ffffff;
		text-decoration: none;
		font-size: 18px;
		font-family: "Droid Serif", serif;
		font-style: italic;
		-moz-border-radius: 3px;
		-webkit-border-radius: 3px;
		border-radius: 3px;
		white-space: nowrap;   
		text-indent: -3000px;
		outline: none;
		background-image: url("../images/prev_arrow.png");
		background-repeat: no-repeat;
		background-position: center center;
	}

	.pagination .nav-buttons .next-button {
		background-image: url("../images/next_arrow.png");
	}

	.pagination .nav-buttons a:hover {
		background-color: #<?php echo $basecolor->bg['0']; ?>;
		-webkit-transition: background-color 0.3s ease-in;
		-moz-transition: background-color 0.3s ease-in;
        -ms-transition: background-color 0.3s ease-in;
        -o-transition: background-color 0.3s ease-in;
		transition: background-color 0.3s ease-in; 
	}
	
/**************************
	SHORTCODES
**************************/

	.alert{
		padding: 15px 25px;
		color: #fff;
		font-size: 18px;
		line-height: 22px;
		font-family: "Droid Serif", "Georgia", serif;
		font-style: italic;
		background-color: #fbc021;
		margin-bottom: 25px;
		border-radius: 5px;
		-moz-border-radius: 5px;
		-webkit-border-radius: 5px;
	}

	.success {
		padding: 15px 25px;
		color: #fff;
		font-size: 18px;
		line-height: 22px;
		font-family: "Droid Serif", "Georgia", serif;
		font-style: italic;
		background-color: #b4c489;
		margin-bottom: 25px;
		border-radius: 5px;
		-moz-border-radius: 5px;
		-webkit-border-radius: 5px;
	}

	.woocommerce_error {
		margin: 0;
	}

	.message, .woocommerce_message, .woocommerce_error li  {
		padding: 15px 25px;
		color: #fff;
		font-size: 18px;
		line-height: 22px;
		font-family: "Droid Serif", "Georgia", serif;
		font-style: italic;
		background-color: #<?php echo $basecolor->bg['0']; ?>;
		margin-bottom: 25px;
		border-radius: 5px;
		-moz-border-radius: 5px;
		-webkit-border-radius: 5px;
	}

	.woocommerce_error li strong {
		color: #fff;
	}

	.woocommerce_error li {
		margin: 0 40px;
		margin-bottom: 25px;
	}

	.woocommerce_error li a {
		margin-bottom: 0;
		background: none;
	}

	.woocommerce_message {
		margin: 0 40px;
		margin-bottom: 25px;
	}

	.post-content .woocommerce_message {
		margin: 0px;
		margin-bottom: 25px;
	}

	.woocommerce_message .button {
		background: none !important;
		margin: 0 !important;
		margin-right: 15px;
	}

	.blockquote {
		margin-bottom: 25px;
		background: url("../images/quote_icon.png") no-repeat left center;
	}

	.divider {
		background: url("../images/sidebar-bottom.png") repeat-x;
		padding-bottom: 15px;
	}

	.callout {
		position: relative;
	}

	.callout h2 {
		font-size: 25px; line-height: 29px; color: #525351; font-style: italic; font-family: "Droid Serif", "Georgia", serif;
	}

	.callout.with-button h2 {
		margin-right: 340px;
	}

	.callout.with-button .action {
		position: absolute;
		top: 0;
		right: 10px;
	}

	.callout.with-button .action .button {
		font-size: 25px;
		line-height: 29px;
		padding: 15px 55px;
	}

	.frame {
		margin-bottom: 1.5em;
		text-align: center;
		padding-top: 0px;
		border: 1px solid #ececec;
		padding-bottom: 15px;
		border: 1px solid #e8e5dc;
		-webkit-box-shadow:  0px 0px 1px 0px rgba(0, 0, 0, 0.2);
        -moz-box-shadow:  0px 0px 1px 0px rgba(0, 0, 0, 0.2);
        box-shadow:  0px 0px 1px 0px rgba(0, 0, 0, 0.2);  
        background-color: #ffffff; 
        background-image: url(../images/product_detail.png);
        background-repeat: no-repeat;
        background-position: bottom left;
		}
	.frame img {
		border: 0 none;
		padding: 0;
		margin: 0;
		max-width: 100%;
		height: auto;
		width: 100%;
		}
	.frame h5 {
		line-height: 20px;
		font-size: 16px;
		margin: 0;
		padding: 10px 20px;
		padding-bottom: 5px;
		text-align: left;
		font-weight: bold;
		}

	.frame p {
		margin: 0;
		padding: 0px 20px 0 20px;
		text-align: left;
		font-size: 11px;
		font-family: "Droid Serif", Georgia, serif;
		color: #a4a4a4 !important;
		font-style: italic;
	}

	.social-icon {
		display: inline-block;
		margin-right: 20px;
		margin-bottom: 5px;
	}

	.tweet_list li {
		padding: 0;
		margin-bottom: 10px;
	}

	.flickr_wrap {

	}

	.flickr_wrap .flickr_badge_image {
		width: 58px; 
		height: 58px;
		display: inline-block;
		float: left;
		margin: 0 10px 10px 0;
	}

	.flickr_wrap .flickr_badge_image img {
		width: 58px; 
		height: 58px;
		-webkit-box-shadow:  3px 3px 0px 0px rgba(0, 0, 0, 0.3);
        -moz-box-shadow:  3px 3px 0px 0px rgba(0, 0, 0, 0.3);
        box-shadow:  3px 3px 0px 0px rgba(0, 0, 0, 0.3);
	}

	.form .loader_icon {
		-moz-border-radius:10px; -webkit-border-radius:10px; border-radius:10px;
		background: transparent url(../images/preload.gif) no-repeat center center;
		background: transparent url(../images/preload.gif) no-repeat center center;
		height: 32px;
		position: relative;
		margin: 10px 0px 0px 0px;
		display: none;
	}

	.loader_message {
		padding: 0px 0;
		color: #f15a23;
		font-weight: bold;
		padding-top: 20px;
		font-family: "Droid Serif", Georgia, serif;
		font-style: italic;
		font-size: 14px;
		padding-left: 3px;
	}

	#myForm {
		margin: 0;
	}

	#myForm input, #myForm textarea {
		margin: 0;
	}

	#myForm button {
		margin: 0;
	}

	.video-container {
		position: relative;
		padding-bottom: 56.25%;
		padding-top: 30px;
		height: 0;
		overflow: hidden;
	}

	.video-container iframe,  
	.video-container object,  
	.video-container embed {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
	}

/**************************
	SIDEBAR 
**************************/

	.sidebar-right {
		width: 345px;
		float: right;
	}

	.widget img {
		max-width: 100%;
		height: auto;
	}
	
	.sidebar-content {
	
	}
	
	.sidebar-content .widget {
		background: url("../images/sidebar-bottom.png") repeat-x;
		padding-top: 30px;
		padding-bottom: 15px;
		color: #9b9b9b;
	}
	
	.sidebar-content .widget:first-child {
		padding-top: 0;
		background: none;
	}
	
	.sidebar-content .widget .widgettitle {
		font-family: '<?php echo $font; ?>';
		font-size: 20px;
		text-transform: uppercase;
		color: #<?php echo $basecolor->bg['0']; ?>;
		margin: 0;
		padding: 0;
		margin-bottom: 20px;
	}

	.sidebar-content .widget p {
		color: #9b9b9b;
	}

	.sidebar-content .widget ul {
		margin: 0;
	}

	.sidebar-content .widget ul li {
		font-family: "Droid Serif", "Georgia", serif;
		font-size: 15px;
		color: #9b9b9b;
		margin: 0;
		padding: 10px 0;
		border-bottom: 1px solid #e6e6e6;
		-moz-box-shadow: 0px 1px rgba(255, 255, 255, 1);
		-webkit-box-shadow: 0px 1px rgba(255, 255, 255, 1);
		box-shadow: 0px 1px rgba(255, 255, 255, 1);
		padding-right: 20px;
	}

	.sidebar-content .widget ul li a {
		color: #9b9b9b;
		text-decoration: none;
	}

	.sidebar-content .widget ul li a:hover {
		color: #555;
	}
	
	.sidebar-content .widget ul li:first-child {
		padding-top: 0;
	}

	.sidebar-content .widget ul li:last-child {
		border-bottom: none;
		padding-bottom: 0;
		-moz-box-shadow: none;
		-webkit-box-shadow: none;
		box-shadow: none;
	}

	#searchform {
		margin: 0;
		margin-right: 40px;
	}

	#searchform input {
		margin: 0;
		border: 1px solid #eae7e4;
		background-color: #ffffff;
		padding: 18px;
		width: 100%;
		display: block;
		font-family: "Droid Serif", "Georgia", serif;
		font-size: 15px;
		color: #a4a4a4;
		font-style: italic;
		-moz-border-radius: 5px;
		-webkit-border-radius: 5px;
		border-radius: 5px;
		background-image: url("../images/search_icon.png");
		background-repeat: no-repeat;
		background-position: 95% center;
	}

	.tagcloud {

	}

	.tagcloud a {
		font-size: 15px !important;
		font-family: "Droid Serif", "Georgia", serif;
		color: #9b9b9b;
		text-decoration: none;
		padding-right: 5px;
	}

	.tagcloud a:hover {
		color: #555;
	}

/**************************
	SIDEBAR FOOTER
**************************/

	#wrapper .footer {
		padding-top: 30px;
		padding-bottom: 5px;
	}

	#wrapper .footer .widget {
		list-style-type: none;
		margin-bottom: 25px;
		color: #adadad;
	}

	#wrapper .footer .widget .widgettitle {
		font-family: '<?php echo $font; ?>';
		font-size: 16px;
		text-transform: uppercase;
		color: #ffffff;
		margin: 0;
		padding: 0;
		margin-bottom: 25px;
		line-height: 20px;
	}

	#wrapper .footer .widget a {
		font-weight: bold;
		color: #ffffff;
		text-decoration: none;
	}

	#wrapper .footer .widget ul {

	}

	#wrapper .footer .widget li a {
		color: #6c6c6c;
	}

	#wrapper .footer .widget a:hover {
		color: #ffffff;
	}

/**************************
	PAGE ADMIN
**************************/

	.post.single .post-block {
		padding-bottom: 5px;
	}

	.comments {
		background: url("../images/sidebar-bottom.png") repeat-x;
		padding-top: 40px;
		padding: 40px 20px 0px 25px;
	}

	.comments h3 {
		font-family: '<?php echo $font; ?>';
		font-size: 20px;
		text-transform: uppercase;
		color: #<?php echo $basecolor->bg['0']; ?>;
		line-height: 24px;
		margin-bottom: 35px;
	}

	.comments .comment {
		margin-bottom: 35px;
	}

	.comments .blog_comment_user {
		width: 80px;
		height: 80px;
		float: left;
	}

	.comments .blog_comment_user a, .comments .blog_comment_user img {
		display: block;
	}

	.comments .blog_comment_user span {
		display: block;
		margin-top: 5px;
		color: #ffffff;
		background-color: #<?php echo $basecolor->bg['0']; ?>;
		text-align: center;
		font-size: 9px;
		margin-right: 20px;
		font-weight: bold;
	}

	.comments .blog_comment_det {
		margin-left: 60px;
		width: auto;
	}

	.comments .blog_comment_det .blog_comment_name_det {
		color: #666;
		font-family: "Droid Serif", "Georgia", sans-serif;
		font-style: italic;
		font-size: 12px;
		margin-bottom: 5px;
		position: relative;
	}

	.comments .blog_comment_det .blog_comment_name_det a {
		display: inline-block;
		font-size: 16px;
		text-decoration: none;
		color: #383936;
		font-family: "Helvetica", "HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif;
		font-weight: bold;
		margin-right: 15px;
	}

	.comments .blog_comment_det .blog_comment_name_det .comment-reply-link {
		position: absolute;
		right: 0;
		top: 5px;
	}

	.comments .children {
		margin-left: 80px;
	}

	.comments .blog_comment_text {
		font-size: 13px !important;
	}

	.comments .blog_comment_text p {
		margin-bottom: 7px;
		font-size: 13px !important;
		line-height: 17px !important;
	}

	#leave_a_reponse {
		background: url("../images/sidebar-bottom.png") repeat-x;
		padding-top: 40px;
		padding: 40px 20px 0px 25px;
	}

	#leave_a_reponse #reply-title {
		font-family: '<?php echo $font; ?>';
		font-size: 20px;
		text-transform: uppercase;
		color: #<?php echo $basecolor->bg['0']; ?>;
		line-height: 24px;
		margin-bottom: 35px;
	}

	#leave_a_reponse textarea {
		height: 150px;		
	}

	#leave_a_reponse .form-submit {
		margin-bottom: 0;
	}

	#leave_a_reponse .form-submit #response_btn {
		margin-bottom: 0;
	}

	#reply-title a {
		text-decoration: none;
	}

/**************************
	PRODUCTS PAGES
**************************/

	.products {
		padding: 0 45px;
		margin-bottom: 10px;
	}

	.related .products, .upsells .products, .cross-sells .products {
		padding: 0;
	}

	.cross-sells .products .product {
		width: 286px;
		margin-bottom: 40px;
	}

	.products .product {
		width: 300px;
		float: left;
		margin-right: 22px;
		border: 1px solid #e8e5dc;
		-webkit-box-shadow:  0px 0px 1px 0px rgba(0, 0, 0, 0.2);
        -moz-box-shadow:  0px 0px 1px 0px rgba(0, 0, 0, 0.2);
        box-shadow:  0px 0px 1px 0px rgba(0, 0, 0, 0.2);  
        background-color: #ffffff; 
        margin-bottom: 25px;
        position: relative;
        padding-bottom: 5px;
        background-image: url(../images/product_detail.png);
        background-repeat: no-repeat;
        background-position: bottom left;
        position: relative;
	}

	.product img {
		max-width: 100%;
		height: auto;
	}

	.products .product.last {
		margin-right: 0px;
	}

	.products .product a {
		text-decoration: none !important;
	}

	.product-wrapper.loading {
		opacity: 0.2;
		-moz-opacity: 0.2;
		filter:alpha(opacity=2);
	}

	.add_to_cart_button.loading-btn {
		opacity: 0.2;
		-moz-opacity: 0.2;
		filter:alpha(opacity=2);
	}

	.adding-product {
		width: 14px;
		height: 14px;
		display: block;
		background-image: url("../images/ajax-loader.gif");
		
		background-repeat: no-repeat;
		position: absolute;
		left: 45%;
		top: 50%;
		display: none;
	}

	.adding-product.visible {
		display: block;
	}

	.adding-product.added {
		display: block;
		width: 16px;
		background-image: url("../images/added.png");
	}

	.products .product .onsale {
		position: absolute;
		top: 0;
		right: 0;
	}

	.products .product img {
		display: block;
	}

	.products .product h3 {
		padding: 20px 15px 5px 15px;

	}

	.products .product h3{
		color: #525351;
		font-size: 16px;
		line-height: 20px;
		font-weight: bold;
		margin: 0;
	}

	.products .product h3.product-title {
		font-family: "Helvetica", "HelveticaNeue", Arial, sans-serif;
		text-transform: capitalize;
	}

	.products .product .excerpt {
		padding: 0px 15px 20px 15px;
		font-family: "Droid Serif", "Georgia", serif;
		font-size: 11px;
		color: #a4a4a4;
		font-style: italic;
	}

	.products .product .excerpt p {
		margin: 0;
	}

	.products .product .price {
		color: #525351;
		font-size: 22px;
		line-height: 24px;
		margin: 0;
		padding: 5px 15px 15px 15px;
		display: block;
		font-weight: bold;
	}

	.products .product .price del {
		text-decoration: none !important;
		color: #e72247 !important;
		font-size: 12px !important;
	}

	.products .product .price ins {
		text-decoration: none !important;
	}

	.products .product .add_to_cart_button {
		position: absolute; 
		right: 15px;
		bottom: 15px;
		margin: 0;
	}

	.woocommerce_ordering {
		text-align: right;
		padding: 0 45px;
		margin-bottom: 30px;
	}

	.woocommerce_ordering .orderby {
		width: 320px;
	}

	.top-shop {
		margin-bottom: 10px;
		position: relative;
	}

	.top-shop .categories {
		float: left;
		width: 300px;
		margin-left: 45px;
		position: relative;
	}

	.top-shop .categories .product-drop {

	  background: #<?php echo $basecolor->bg['0']; ?>;
	  background: -moz-linear-gradient(top,  #<?php echo $basecolor->bg['+3']; ?> 0%, #<?php echo $basecolor->bg['+3']; ?> 4%, #<?php echo $basecolor->bg['0']; ?> 5%, #<?php echo $basecolor->bg['-1']; ?> 99%);
	  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#<?php echo $basecolor->bg['+3']; ?>), color-stop(4%,#<?php echo $basecolor->bg['+3']; ?>), color-stop(5%,#<?php echo $basecolor->bg['0']; ?>), color-stop(99%,#<?php echo $basecolor->bg['-1']; ?>));
	  background: -webkit-linear-gradient(top,  #<?php echo $basecolor->bg['+3']; ?> 0%,#<?php echo $basecolor->bg['+3']; ?> 4%,#<?php echo $basecolor->bg['0']; ?> 5%,#<?php echo $basecolor->bg['-1']; ?> 99%);
	  background: -o-linear-gradient(top,  #<?php echo $basecolor->bg['+3']; ?> 0%,#<?php echo $basecolor->bg['+3']; ?> 4%,#<?php echo $basecolor->bg['0']; ?> 5%,#<?php echo $basecolor->bg['-1']; ?> 99%);
	  background: -ms-linear-gradient(top,  #<?php echo $basecolor->bg['+3']; ?> 0%,#<?php echo $basecolor->bg['+3']; ?> 4%,#<?php echo $basecolor->bg['0']; ?> 5%,#<?php echo $basecolor->bg['-1']; ?> 99%);
	  background: linear-gradient(top,  #<?php echo $basecolor->bg['+3']; ?> 0%,#<?php echo $basecolor->bg['+3']; ?> 4%,#<?php echo $basecolor->bg['0']; ?> 5%,#<?php echo $basecolor->bg['-1']; ?> 99%);
	  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#<?php echo $basecolor->bg['+3']; ?>', endColorstr='#<?php echo $basecolor->bg['-1']; ?>',GradientType=0 );


	  border: 1px solid #<?php echo $basecolor->bg['0']; ?>;

	  padding: 18px 15px;
	  -moz-border-radius: 5px;
	  -webkit-border-radius: 5px;
	  border-radius: 5px;
	  color: #ffffff !important;
	  display: inline-block;
	  font-size: 16px;
	  text-decoration: none;
	  text-shadow: 0 1px rgba(0, 0, 0, .3);
	  cursor: pointer;
	  margin-bottom: 20px;
	  line-height: 18px;
	  font-family: "Helvetica", "HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif;
	  margin: 0;
	  font-weight: bold;

	  position: relative;
	  top: 0px;
	  left: 0;
	}

	.top-shop .categories ul {
		position: absolute;
		width: 200px;
		background-color: #<?php echo $basecolor->bg['-2']; ?>;
		z-index: 9999;
		padding: 15px 25px;
		left: 0;
		top: 75px;
		/*display: none;*/
	}

	.top-shop .categories.opened ul {
		display: block;
	}

	.top-shop .categories ul li a {
		padding: 0;
	}

	.top-shop .categories ul:after, .top-shop .categories ul:before {
		bottom: 100%;
		border: solid transparent;
		content: " ";
		height: 0;
		width: 0;
		position: absolute;
		pointer-events: none;
	}

	.top-shop .categories ul:after {
		border-bottom-color: #<?php echo $basecolor->bg['-2']; ?>;
		border-width: 15px;
		left: 25%;
		margin-left: -15px;
	}

	.top-shop .categories ul:before {
		border-bottom-color: #<?php echo $basecolor->bg['-2']; ?>;
		border-width: 16px;
		left: 25%;
		margin-left: -16px;
	}

	.top-shop .categories ul {
		display: none;
		margin: 0;
	}

	/*.top-shop .categories:hover ul {
		display: block;
	}*/

	.top-shop .product-drop {
		margin-bottom: 25px !important;
		position: absolute;
		top: 0;
		left: 0;
	}

	.top-shop .categories ul li {
		font-family: '<?php echo $font; ?>';
		font-size: 14px;
		line-height: 18px;
		text-transform: uppercase;
		margin: 0;
		padding: 10px 0;
	}

	.top-shop .categories ul li:last-child {

	}

	.top-shop .categories ul li a {
		color: #ffffff;
		text-decoration: none;
	}

	.top-shop .categories ul li a:hover {
	}

	.top-shop .shop-search {
		float: right;
		width: 300px;
		margin-right: 10px;
		position: relative;
		top: 2px;
	}

/***********************************************
	PRODUCT SINGLE
/**********************************************/

	.product.type-product {
		width: 620px;
		background-color: #ffffff;
		margin-right: 15px;
		float: left;
		-webkit-box-shadow:  0px 1px 3px 1px rgba(0, 0, 0, 0.1);
        -moz-box-shadow:  0px 1px 3px 1px rgba(0, 0, 0, 0.1);
        box-shadow:  0px 1px 3px 1px rgba(0, 0, 0, 0.1);
		margin-bottom: 35px;
		margin-left: 43px;
	}

	.product .social {
		padding: 10px 15px 25px 20px;

	}

	.product .social iframe {
		display: inline-block;
		float: left;
		position: relative;
		top: 2px;
	}

	.product .stock {
		color: #fff;
		font-size: 18px;
		line-height: 22px;
		font-family: "Droid Serif", "Georgia", serif;
		font-style: italic;
		background-color: #<?php echo $basecolor->bg['0']; ?>;
		margin-bottom: 25px;
		border-radius: 5px;
		-moz-border-radius: 5px;
		-webkit-border-radius: 5px;
		margin: 0;
		margin: 15px 15px 0px 20px;
		padding: 15px 25px;
	}

	.product .single_variation .stock {
		margin: 0px 0px 15px 0px;
	}

	/*
	.product .stock {
		color: #383936;
		font-size: 18px;
		line-height: 22px;
		font-family: "Droid Serif", "Georgia", serif;
		font-style: italic;
		margin: 0;
		padding: 15px 15px 15px 20px;
		border-bottom: 1px solid #E6E6E6;
	}
	*/

/**************************
	SIDEBAR 
**************************/

	.sidebar-right {
		width: 345px;
		float: right;
	}
	
	.sidebar-content {
	
	}
	
	.sidebar-content .widget {
		background: url("../images/sidebar-bottom.png") repeat-x;
		padding-top: 30px;
		padding-bottom: 15px;
		color: #9b9b9b;
	}
	
	.sidebar-content .widget:first-child {
		padding-top: 0;
		background: none;
	}
	
	.sidebar-content .widget .widgettitle {
		font-family: '<?php echo $font; ?>';
		font-size: 20px;
		text-transform: uppercase;
		color: #<?php echo $basecolor->bg['0']; ?>;
		margin: 0;
		padding: 0;
		margin-bottom: 20px;
	}

	.sidebar-content .widget p {
		color: #9b9b9b;
	}

	.sidebar-content .widget ul {
		margin: 0;
	}

	.sidebar-content .widget ul li {
		font-family: "Droid Serif", "Georgia", serif;
		font-size: 15px;
		color: #9b9b9b;
		margin: 0;
		padding: 10px 0;
		border-bottom: 1px solid #e6e6e6;
		-moz-box-shadow: 0px 1px rgba(255, 255, 255, 1);
		-webkit-box-shadow: 0px 1px rgba(255, 255, 255, 1);
		box-shadow: 0px 1px rgba(255, 255, 255, 1);
		padding-right: 20px;
	}

	.sidebar-content .widget ul li a {
		color: #9b9b9b;
		text-decoration: none;
	}

	.sidebar-content .widget ul li a:hover {
		color: #555;
	}
	
	.sidebar-content .widget ul li:first-child {
		padding-top: 0;
	}

	.sidebar-content .widget ul li:last-child {
		border-bottom: none;
		padding-bottom: 0;
		-moz-box-shadow: none;
		-webkit-box-shadow: none;
		box-shadow: none;
	}

/**************************
	PRODUCT SINGLE
**************************/

	.product {
		background-image: url(../images/product_detail.png);
        background-repeat: no-repeat;
        background-position: bottom left;
        margin-bottom: 40px;
	}

	.product .images {
		
	}

	.product .title {
		padding: 15px 15px 25px 20px;
		border-bottom: 1px solid #e6e6e6;
	}

	.product .product-description p {
		font-size: 11px;
		color: #a4a4a4;
		margin: 0;
		line-height: 15px;
		font-style: italic;
		padding-top: 10px;
	}

	.product .title h1 {
		font-size: 25px;
		font-weight: bold;
		color: #525351;
		margin: 0;
		line-height: 29px;
	}

	.product .price-wrapper {
		padding: 25px 15px 25px 20px;
		border-bottom: 1px solid #e6e6e6;
		position: relative;
	}

	.product .summary .cart button[type="submit"] {
		position: absolute;
		top: 17px;
		right: 15px;
		font-size: 25px !important;
		padding: 20px 25px;
	}

	.product .price-wrapper p {
		margin: 0;
		padding: 0;
		font-size: 45px;
		font-weight: bold;
		line-height: 49px;
		color: #383936;
	}

	.product .price-wrapper p del {
		color: #bababa;
		display: inline-block;
		margin-right: 20px;
	}

	.product .price-wrapper p ins {
		text-decoration: none;
	}

	.product .summary .cart {
		
	}

	.summary .product-fields {
		padding: 15px 15px 15px 20px;
		border-bottom: 1px solid #e6e6e6;
		position: relative;
	}

	.summary .product-fields .quantity input {
		margin: 0;
	}

	.summary .product-fields label {
		color: #525351;
		font-weight: bold;
		font-size: 14px;
		margin-bottom: 10px;
	}

	.product .woocommerce_tabs {
		padding: 0px 15px 15px 20px;

	}

	.product .woocommerce_tabs .panel {
		color: #525351;
		font-size: 13px;
		line-height: 18px;
	}

	.product .shop_attributes {
		width: 100%;
		margin-bottom: 20px;
		border: 1px solid #ddd;
	}

	.product .shop_attributes th {
		padding: 10px 25px;
		font-weight: bold;
		text-align: center;
		background-color: #eee;
		border: 1px solid #ddd;
	}

	.product .shop_attributes td {
		padding: 10px 25px;
		border: 1px solid #ddd;
	}

	.related h2 {
		font-family: '<?php echo $font; ?>';
		font-size: 20px;
		text-transform: uppercase;
		color: #<?php echo $basecolor->bg['0']; ?>;
		margin-bottom: 35px;
		line-height: 24px;
	}

	.product .variations_form {
		
	}

	.product .variations-table {
		padding: 40px 15px 5px 20px;
		border-bottom: 1px solid #ddd;
	}

	.product table.variations {
		width: 70%;
	}


	.product table.variations select {
		margin-bottom: 10px;
	}

	.product table.variations label {
		padding: 5px;
	}

	.product .reset_variations {
		font-family: "Droid Serif", Georgia, serif;
		font-style: italic;
		font-size: 15px;
		text-decoration: none;
		padding-bottom: 10px;
		display: inline-block;
	}

	.product .single_variation_wrap {
		padding: 20px 15px 5px 20px;
		border-bottom: 1px solid #ddd;
		position: relative;
	}

	.product .single_variation_wrap span.price {
		margin: 0;
		display: block;
		padding: 0;
		font-size: 45px;
		font-weight: bold;
		line-height: 49px;
		color: #383936;
		margin-bottom: 25px;
	}

	.product .single_variation_wrap .from {
		display: none;
	}

	.product span.price del {
		color: #bababa;
		display: inline-block;
		margin-right: 20px;
	}

	.product .single_variation_wrap span.price ins {
		text-decoration: none;
	}

	.price-wrapper-external p {
		margin: 0;
	}

	.price-wrapper-external a {
		margin: 0;
	}

	.product .price-wrapper-external {
		padding: 25px 15px 25px 20px;
		border-bottom: 1px solid #e6e6e6;
		position: relative;
		margin-bottom: 25px;
	}

	.product .price-wrapper-external a {
		font-size: 25px !important;
		padding: 20px 25px;
	}

	.product .woocommerce_tabs div ul {
		margin-left: 20px;
		list-style-type: square;
	}

	.product .flexslider .slides, .product .flexslider .slides > li {
		margin-left: 0;
	}


/***************************
	PRODUCT COMMENTS
****************************/

	.star-rating{
		float:right;width:80px;height:16px;background:url(../images/star.png) repeat-x left 0;
	}

	.star-rating span{
		background:url(../images/star.png) repeat-x left -32px;height:0;padding-top:16px;overflow:hidden;float:left;
	}

	.hreview-aggregate .star-rating{margin:10px 0 0 0}

	#review_form #respond{position:static;margin:0;width:auto;padding:0;background:transparent none;border:0}

	#review_form #respond:after{content:"";display:block;clear:both}#review_form #respond p{margin:0 0 10px}

	#review_form #respond .form-submit input{left:auto}

	#review_form #respond textarea{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;width:100%}

	p.stars:after{content:"";display:block;clear:both}

	p.stars span{width:80px;height:16px;position:relative;float:left;background:url(../images/star.png) repeat-x left 0}

	p.stars span a{float:left;position:absolute;left:0;top:0;width:16px;height:0;padding-top:16px;overflow:hidden}

	p.stars span a:hover,p.stars span a:focus{background:url(../images/star.png) repeat-x left -16px}

	p.stars span a.active{background:url(../images/star.png) repeat-x left -32px}

	p.stars span a.star-1{width:16px;z-index:10}p.stars span a.star-2{width:32px;z-index:9}

	p.stars span a.star-3{width:48px;z-index:8}p.stars span a.star-4{width:64px;z-index:7}

	p.stars span a.star-5{width:80px;z-index:6}

	#reviews h2 {
		font-family: '<?php echo $font; ?>';
		font-size: 20px;
		text-transform: uppercase;
		color: #<?php echo $basecolor->bg['0']; ?>;
		margin-bottom: 30px;
		line-height: 24px;
	}

	.commentlist {
		list-style-type: none;
		margin-left: 0;
	}

	.commentlist li {
		margin-bottom: 25px;
	}

	.commentlist img.avatar {
		display: block;
		width: 60px;
		height: 60px;
		float: left;
	}

	.commentlist .comment-text {
		margin-left: 80px;
	}

	.commentlist .meta {
		margin-bottom: 10px;
		font-size: 14px;
		padding-bottom: 10px;
		border-bottom: 1px solid #ddd;
	}

	.commentlist .description p {
		margin-bottom: 10px;
	}

	#reply-title {
		font-family: '<?php echo $font; ?>';
		font-size: 20px;
		text-transform: uppercase;
		color: #<?php echo $basecolor->bg['0']; ?>;
		line-height: 24px;
		margin-bottom: 30px;
	}

	#woo-review label {
		display: inline-block;
		font-size: 14px;
		margin-bottom: 10px;
	}

	#woo-review .required {
		display: inline-block;
		font-size: 14px;
		margin-bottom: 10px;
	}

/***************************
	PRODUCT SLIDER 
****************************/

	.flex-control-nav {
		text-align: left;
		left: 20px;
		bottom: 20px;
	}

	.flex-control-nav li a {
		background: url(../images/product_nav.png) no-repeat scroll 0 0 transparent;
		width: 18px;
		height: 19px;
	}

	.flex-control-nav li a:hover, .flex-control-nav li a.active {
		background: url(../images/product_nav_hover.png) no-repeat scroll 0 0 transparent;
	}


/****************************
	QUANTITY INPUT 
****************************/

	.quantity .minus {
		-moz-border-radius: 5px 0px 0px 5px;
		-webkit-border-radius: 5px 0px 0px 5px;
        border-radius: 5px 0px 0px 5px;
        padding: 5px 10px;
        position: relative;
	}

	.quantity .plus {
		-moz-border-radius: 0px 5px 5px 0px;
		-webkit-border-radius: 0px 5px 5px 0px;
        border-radius: 0px 5px 5px 0px;
        padding: 5px 10px;
        position: relative;
	}

	.quantity .input-text {
		border: none;
		border-top: 1px solid #b7babc;
		border-bottom: 1px solid #b7babc;
		height: 33px;
		line-height: 33px;
		text-align: center;
		font-weight: bold;
		color: #605b5b;
		position: relative;
		top: -2px;

		background: #ced1d3;
		background: -moz-linear-gradient(top,  #ffffff 0%, #f0f2f2 5%, #ced1d3 100%);
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(5%,#f0f2f2), color-stop(100%,#ced1d3));
		background: -webkit-linear-gradient(top,  #ffffff 0%,#f0f2f2 5%,#ced1d3 100%);
		background: -o-linear-gradient(top,  #ffffff 0%,#f0f2f2 5%,#ced1d3 100%);
		background: -ms-linear-gradient(top,  #ffffff 0%,#f0f2f2 5%,#ced1d3 100%);
		background: linear-gradient(top,  #ffffff 0%,#f0f2f2 5%,#ced1d3 100%);
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ced1d3',GradientType=0 );

	}

/**************************
	CART
**************************/

	.shop_table.cart {
		width: 100%;
		background-color: #ffffff;
		-webkit-box-shadow:  0px 1px 3px 1px rgba(0, 0, 0, 0.1);
        -moz-box-shadow:  0px 1px 3px 1px rgba(0, 0, 0, 0.1);
        box-shadow:  0px 1px 3px 1px rgba(0, 0, 0, 0.1);
        background-image: url("../images/table_detail.png");
        background-repeat: repeat-y;
        background-position: right top;
        margin-bottom: 35px;
	}

	.shop_table.cart th {
		border-bottom: 1px solid #e6e6e6;
		border-left: 1px solid #e6e6e6;
		text-align: center;
		font-family: "<?php echo $font; ?>", Arial, sans-serif;
		font-size: 20px;
		line-height: 24px;
		color: #<?php echo $basecolor->bg['0']; ?>;
		text-transform: uppercase;
		padding: 10px;
	}

	.shop_table.cart .product-remove {
		border-left: none;
	}

	.shop_table.cart tr {
		border-bottom: 1px solid #e6e6e6;
	}

	.shop_table.cart tr td {
		text-align: center;
		padding: 20px 20px;
		border-left: 1px solid #e6e6e6;
		vertical-align: middle;
		color: #525351;
		font-size: 16px;
		font-weight: bold;
	}

	.shop_table.cart tr .actions {
		text-align: left;

	}

	.shop_table .actions-div {
		position: relative;
		left: 0;
		top: 0;
		display: block;
	}

	.shop_table .actions-div .update-cart {
		position: absolute;
		right: 15px;
		top: 0px;
	}

	.shop_table.cart tr .actions input[name="update_cart"] {
		position: relative;
		margin-top: 42px;
		margin-left: 10px;
	}

	.shop_table.cart .product-remove {

	}

	.shop_table.cart td.product-name {
		text-align: left;
	}

	.shop_table.cart .product-name a {
		color: #525351;
	}

	.shop_table.cart .product-name a:hover {
		text-decoration: none;
	}

	.shop_table h2 {
		font-family: "<?php echo $font; ?>", Arial, sans-serif;
		font-size: 20px;
		line-height: 24px;
		color: #<?php echo $basecolor->bg['0']; ?>;
		text-transform: uppercase;
	} 

	.shop_table .coupon input {
		display: inline-block;
	}

	.shop_table .coupon {
		font-weight: normal;
	}

	.shop_table .coupon #coupon_code {
		width: 240px;
	}

	.shop_table .actions {
		position: relative;
	}

	.coupon {
		width: 400px;
		float: left;
	}

	.shop_table .qty {
		font-weight: bold;
		color: #525351;
		font-size: 16px;
		text-align: center;
		margin: 0;
	}
	
	.cart-collaterals {

	}

	.cart-collaterals .shipping-area {
		width: 360px;
		float: left;
		background-color: #ffffff;
		-webkit-box-shadow:  0px 1px 3px 1px rgba(0, 0, 0, 0.1);
        -moz-box-shadow:  0px 1px 3px 1px rgba(0, 0, 0, 0.1);
        box-shadow:  0px 1px 3px 1px rgba(0, 0, 0, 0.1);
        background-image: url("../images/table_detail.png");
        background-repeat: repeat-y;
        background-position: right top;
	}

	.cart-collaterals .shipping-content {
		margin: 20px;
	}

	.cart-collaterals .shipping-content h2 {
		color: #<?php echo $basecolor->bg['0']; ?>;
		font-family: '<?php echo $font; ?>';
		font-size: 20px;
		text-transform: uppercase;
		line-height: 24px;
		margin-bottom: 20px;
	}

	.cart-collaterals .shipping-content .submit-shipping {
		margin: 0;
		text-align: right;
	}

	.cart-collaterals .shipping-content .submit-shipping .button {
		margin: 0;
	}

	.cart-collaterals .cart_totals {
		width: 520px;
		float: right;
		background-color: #ffffff;
		-webkit-box-shadow:  0px 1px 3px 1px rgba(0, 0, 0, 0.1);
        -moz-box-shadow:  0px 1px 3px 1px rgba(0, 0, 0, 0.1);
        box-shadow:  0px 1px 3px 1px rgba(0, 0, 0, 0.1);
        background-image: url("../images/table_detail.png");
        background-repeat: repeat-y;
        background-position: right top;
	}

	.cart-collaterals .cart-totals-content{
		margin: 20px;
	}

	.cart-collaterals .cart_totals h2 {
		color: #<?php echo $basecolor->bg['0']; ?>;
		font-family: '<?php echo $font; ?>';
		font-size: 20px;
		text-transform: uppercase;
		line-height: 24px;
		margin-bottom: 20px;
	}

	.cart-collaterals .cart_totals table {
		width: 100%;
		margin-bottom: 20px;
	}

	.cart-collaterals .cart_totals table tr {
		border: 1px solid #e6e6e6;
	}

	.cart-collaterals .cart_totals table tr th {
		padding: 10px 5px;
		color: #383936;
		font-family: '<?php echo $font; ?>';
		font-size: 20px;
		text-transform: uppercase;
		line-height: 24px;
		border: 1px solid #e6e6e6;
	}

	.cart-collaterals .cart_totals table td {
		padding: 10px 5px;
		color: #383936;
		font-family: '<?php echo $font; ?>';
		font-size: 20px;
		text-transform: uppercase;
		line-height: 24px;
		text-align: center;
	}

	.cart-collaterals .cart_totals table .total th, .cart-collaterals .cart_totals table .total td {
		color: #<?php echo $basecolor->bg['0']; ?>;
	}

	.go-checkout {
		text-align: right;
		padding-top: 20px;
	}

	.go-checkout a {
		font-size: 25px;
		line-height: 29px;
		padding: 15px 25px;
		margin: 0;
		font-weight: bold;
	}

	.woocommerce-cart .content-woo {
		margin-bottom: 15px;
	}

/**************************
	CHECKOUT
**************************/

	.box-striped {
		background-color: #ffffff;
		-webkit-box-shadow:  0px 1px 3px 1px rgba(0, 0, 0, 0.1);
        -moz-box-shadow:  0px 1px 3px 1px rgba(0, 0, 0, 0.1);
        box-shadow:  0px 1px 3px 1px rgba(0, 0, 0, 0.1);
        background-image: url("../images/table_detail.png");
        background-repeat: repeat-y;
        background-position: right top;
        margin-bottom: 30px;
	}

	.box-striped label {

	}

	.login-box {
		position: relative;
	}

	.checkout .woocommerce_error li {
		margin-left: 0;
		margin-right: 0;
	}

	.login-box h3 {
		margin: 0;
		color: #<?php echo $basecolor->bg['0']; ?>;
		font-family: '<?php echo $font; ?>';
		font-size: 20px;
		line-height: 24px;
		text-transform: uppercase;
		padding: 20px 30px 20px 40px;
		border-bottom: 1px solid #e6e6e6;
	}

	.login-box .showlogin {
		position: absolute;
		right: 30px;
		top: 10px;
	}

	.login-box form {
		padding: 20px 30px 5px 40px;
		margin-bottom: 0;
	}

	.box-striped label {
		display: inline-block;
		font-size: 14px;
		margin-bottom: 10px;
	}

	.box-striped form .required {
		display: inline-block;
		font-size: 14px;
		margin-bottom: 10px;
	}

	.box-striped form input, .box-striped form .button {
		margin-bottom: 0;
	}

	.form-row-first {
		width: 47%;
		float: left;
		margin-right: 6%;
	}

	.form-row-last {
		width: 47%;
		float: left;
	}

	.checkout-info {
		
	}

	.checkout-info .title {
		margin: 0;
		color: #<?php echo $basecolor->bg['0']; ?>;
		font-family: '<?php echo $font; ?>';
		font-size: 20px;
		line-height: 24px;
		text-transform: uppercase;
		padding: 20px 30px 20px 40px;
		border-bottom: 1px solid #e6e6e6;
	}

	.inside-checkout {
		padding: 20px 30px 5px 40px;
		margin-bottom: 0;
		border-bottom: 1px solid #e6e6e6;
	}

	.checkout-info input, .checkout-info .button, #shiptobilling, #createaccount-row {
		margin-bottom: 0;
	}

	.inside-checkout h3 {
		font-size: 16px;
		line-height: 20px;
		color: #525351;
		font-weight: bold;
	}

	.shipping-title {
		padding: 20px 0;
	}

	.box-striped .title {
		margin: 0;
		color: #<?php echo $basecolor->bg['0']; ?>;
		font-family: '<?php echo $font; ?>';
		font-size: 20px;
		line-height: 24px;
		text-transform: uppercase;
		padding: 20px 30px 20px 40px;
		border-bottom: 1px solid #e6e6e6;
	}

	.review-box .shop_table {
		width: 100%;
	}

	.review-box .shop_table th {
		border-bottom: 1px solid #e6e6e6;
		border-left: 1px solid #e6e6e6;
		text-align: center;
		font-family: "<?php echo $font; ?>", Arial, sans-serif;
		font-size: 20px;
		line-height: 24px;
		color: #525351;
		text-transform: uppercase;
		padding: 10px;
	}


	.review-box .shop_table tr {
		border-bottom: 1px solid #e6e6e6;
	}

	.review-box .shop_table tr td {
		text-align: center;
		padding: 10px 20px;
		border-left: 1px solid #e6e6e6;
		vertical-align: middle;
		color: #525351;
		font-size: 16px;
		font-weight: bold;
	}

	.review-box .shop_table .product-name {
		text-align: left;
		padding: 20px 20px 20px 40px;
	}

	/** TAXS AND ORDER TOTALS **/

	.tax-details {
		width: 65%;
		float: right;
	}

	.tax-details table {
		width: 100%;
	}

	.tax-details table tr {
		border: 1px solid #e6e6e6;
	}

	.tax-details table tr th {
		padding: 10px 5px;
		color: #383936;
		font-family: '<?php echo $font; ?>';
		font-size: 20px;
		text-transform: uppercase;
		line-height: 24px;
		border: 1px solid #e6e6e6;
	}

	.tax-details table td {
		padding: 10px 5px;
		color: #383936;
		font-family: '<?php echo $font; ?>';
		font-size: 20px;
		text-transform: uppercase;
		line-height: 24px;
		text-align: center;
	}

	.tax-details table .total th, .tax-details table .total td {
		color: #<?php echo $basecolor->bg['0']; ?>;
	}

	/* Payments Methods */

	.payment_methods {
		margin: 0;
		padding: 0;
	}

	.payment_methods li {
		padding: 20px 20px 20px 40px;
		font-size: 16px;
		border-bottom: 1px solid #e6e6e6;
		margin: 0;
	}

	.payment_methods li label, .payment_methods li input {
		margin: 0;
	}

	.payment_methods li p {
		margin: 0;
		font-style: italic;
		padding-top: 5px;
		padding-left: 15px;
	}

	.payment_methods li img {
		vertical-align: middle;
		padding-left: 10px;
	}

	/** Place Order Button **/

	.place-order {
		text-align: right;
		padding-top: 25px;
	}

	.place-order .button {
		font-size: 25px;
		line-height: 29px;
		padding: 15px 25px;
		margin: 0;
		font-weight: bold;
	}

	.woocommerce-checkout .content-woo, .woocommerce-checkout .post-block {
		margin-bottom: 15px;
		padding-bottom: 0;
	}

/**************************
	MY ACCOUNT
**************************/

	.woocommerce-account h2 {
		color: #<?php echo $basecolor->bg['0']; ?>;
		font-family: '<?php echo $font; ?>';
		font-size: 20px;
		text-transform: uppercase;
		line-height: 24px;
		margin-bottom: 20px;
	}

	.woocommerce-account h3 {
		color: #<?php echo $basecolor->bg['0']; ?>;
		font-family: '<?php echo $font; ?>';
		font-size: 18px;
		text-transform: uppercase;
		line-height: 22px;
		margin-bottom: 20px;
	}

	.shop_table{
		width: 100%;
		background-color: #ffffff;
		-webkit-box-shadow:  0px 1px 3px 1px rgba(0, 0, 0, 0.1);
        -moz-box-shadow:  0px 1px 3px 1px rgba(0, 0, 0, 0.1);
        box-shadow:  0px 1px 3px 1px rgba(0, 0, 0, 0.1);
        background-image: url("../images/table_detail.png");
        background-repeat: repeat-y;
        background-position: right top;
        margin-bottom: 35px;
	}

	.shop_table th {
		border-bottom: 1px solid #e6e6e6;
		border-left: 1px solid #e6e6e6;
		text-align: center;
		font-family: "<?php echo $font; ?>", Arial, sans-serif;
		font-size: 20px;
		line-height: 24px;
		color: #<?php echo $basecolor->bg['0']; ?>;
		text-transform: uppercase;
		padding: 10px;
		word-wrap: normal !important;
	}

	.shop_table .product-remove {
		border-left: none;
	}

	.shop_table tr {
		border-bottom: 1px solid #e6e6e6;
		
	}

	.shop_table tr td {
		text-align: left;
		padding: 10px 10px;
		border-left: 1px solid #e6e6e6;
		vertical-align: middle;
		color: #525351;
		font-size: 16px;
		font-weight: bold;
		word-wrap: break-word !important;
	}

	.shop_table .order-total, .shop_table .order-status, .shop_table .order-actions {
		text-align: center;
	}

	.my_account_subscriptions .order-number {
        text-align: center;
    }

/****************************
	HOMEPAGE
****************************/

	.content-home {
		padding-top: 30px;
		width: 960px;
		margin-bottom: 40px;
	}

	.content-full.content-home .post .post-block {
		padding: 0;
	}

	.content-home .products {
		padding: 0;
		margin: 0;
	}

	.mega-container .padding.padding-home {
		padding: 0 45px;
	}

	.post h1, .contact-form-block h1 {
		font-size: 20px;
		font-family: "<?php echo $font; ?>", Helvetica, HelveticaNeue, sans-serif;
		line-height: 24px;
		margin-bottom: 35px;
		color: #<?php echo $basecolor->bg['0']; ?>;
	}

	.content-home .divider {
		width: 1040px;
		position: relative;
		left: -45px;
	}

	.home-slider {
		background-color: #ffffff;
	}

	/* Caption style */
	/* IE rgba() hack */
	.home-slider .flex-caption {
		zoom: 1;
	}

	.home-slider .flex-caption {
		/*width: 96%;*/ width: 370px; 
		padding: 0; position: absolute; 
		left: 0; top: 0;
		padding: 40px 5px 10px 45px;
		background: #ffffff !important; color: #313131; font-size: 14px; line-height: 18px;
		height: 100%;
	}

	.home-slider .flex-caption:after, .home-slider .flex-caption:before { 
		left: 100%; border: solid transparent; content: " "; height: 0; width: 0; position: absolute; pointer-events: none; } 

	.home-slider .flex-caption:after { border-left-color: #fffffffff; border-width: 20px; top: 30%; margin-top: -20px; } 

	.home-slider .flex-caption:before { border-left-color: #ffffff; border-width: 26px; top: 30%; margin-top: -26px; }

	.home-slider .flexslider .slides img.with-caption {
		float: right;
	}

	.home-slider .flex-direction-nav, .home-slider .flex-direction-nav li {
		margin: 0;
	}

	.home-slider .flex-caption h1 {
		color: #<?php echo $basecolor->bg['0']; ?>;
		font-size: 25px;
		line-height: 29px;
		margin-bottom: 10px;
		font-weight: bold;
		padding-right: 25px;
	}

	.home-slider .flex-caption .small-desc {
		font-size: 11px;
		line-height: 15px;
		color: #a4a4a4;
		margin-bottom: 30px;
		font-family: "Droid Serif", Georgia, serif;
		font-style: italic;
		padding-right: 25px;
	}

	.home-slider .flex-caption .description {
		font-size: 13px;
		color: #525351;
		line-height: 17px;
		padding-right: 25px;
	}

	.home-slider .flex-caption .price {
		margin-bottom: 30px;
		padding-right: 25px;
		font-size: 40px;
		line-height: 44px;
	}

	.home-slider .flex-caption .price .cutted {
		color: #bababa;
		padding-right: 5px;
		font-weight: bold;
		text-decoration: line-through;
	}

	.home-slider .flex-caption .price .sale{
		color: #525351;
		font-weight: bold;
		text-decoration: none;
	}

	.home-slider .flex-caption .slide-button a {
		width: auto;
		display: block;
		font-size: 32px;
		line-height: 36px;
		margin: 0;
		margin-right: 25px;
		text-align: center;
		font-weight: bold;
	}

	/*
	.flex-direction-nav li a {width: 54px; height: 52px; margin: -13px 0 0; display: block; background: url(theme/bg_direction_nav.png) no-repeat 0 0; position: absolute; top: 47%; cursor: pointer; text-indent: -9999px;}
	.flex-direction-nav li .next { right: 5px;}
	.flex-direction-nav li .prev {left: 5px;}
	.flex-direction-nav li .disabled {opacity: .3; filter:alpha(opacity=30); cursor: default;}
	*/

	.home-slider .flex-direction-nav li a {
		width: 47px; 
		height: 43px; 
		margin: -13px 0 0; 
		display: block; 
		background: url(../images/arrow_slider_left.png) #3e3e3f no-repeat center center; 
		position: absolute;
		
		cursor: pointer; 
		text-indent: -9999px;
		-webkit-border-radius: 5px;
    	-moz-border-radius: 5px;
  		border-radius: 5px;
  		z-index: 9999;
  		right: 5px;
  		bottom: 10px;
	}

	.home-slider .flex-direction-nav li a:hover {
		background-color: #<?php echo $basecolor->bg['0']; ?>;
		-webkit-transition: background-color 0.3s ease-in;
		-moz-transition: background-color 0.3s ease-in;
        -ms-transition: background-color 0.3s ease-in;
        -o-transition: background-color 0.3s ease-in;
		transition: background-color 0.3s ease-in; 
	}

	.home-slider .flex-direction-nav li .next {
		background: url(../images/arrow_slider_right.png) #3e3e3f no-repeat center center; 
		right: 45px;
  		bottom: 15px;
		z-index: 9999;
	}

	.home-slider .flex-direction-nav li .prev {

		background: url(../images/arrow_slider_left.png) #3e3e3f no-repeat center center; 
		right: 100px;
  		bottom: 15px;
		z-index: 9999;

	}
	
	.home-slider .flex-direction-nav li .disabled {opacity: .3; filter:alpha(opacity=30); cursor: default;}

/**************************
	CONTACT
**************************/

	.contact-block, .contact-form-block {
		background-color: #ffffff;
		-webkit-box-shadow:  0px 1px 3px 1px rgba(0, 0, 0, 0.1);
        -moz-box-shadow:  0px 1px 3px 1px rgba(0, 0, 0, 0.1);
        box-shadow:  0px 1px 3px 1px rgba(0, 0, 0, 0.1);
		margin-bottom: 50px;
	}

	.content-contact .post {
		width: 40%;
		float: left;

	}

	.content-contact .gmap-side {
		width: 60%;
		float: right;
	}

	.contact-form-block {
		width: 60%;
		padding: 25px 20px 20px 20px;
		float: left;

	}

	.social-media {
		width: 30%;
		float: right;
		text-align: center;
		margin-right: 15px;
	}

	.social-media .big-social {
		display: inline-block;
		margin: 0 15px 45px 15px;
	}

/*****************************
	WOO WIDGETS
*****************************/

	.product_list_widget .attachment-shop_thumbnail {
		float: left;
		margin: 0 10px 10px 0;
	}

	.product_list_widget a {

	}

	.product_list_widget li:after {
		 clear: both;
		 content: '\0020';
	     display: block;
	     overflow: hidden;
	     visibility: hidden;
	     width: 0;
	     height: 0;
	}

	.product_list_widget .quantity {
		display: block;
		padding-top: 10px;
		margin-left: 100px;
	}

	.product_list_widget .variation {
		display: block;
		padding-top: 10px;
		margin-left: 100px;
	}

	.product_list_widget .variation dt {
		font-weight: bold;
	}

	.product_list_widget .variation dd {
		padding-left: 5px;
		margin-bottom: 5px;
		font-weight: normal;
	}

	.widget_shopping_cart .total {
		padding-top: 20px;
	}

	.widget_shopping_cart .buttons, .widget_shopping_cart .buttons a {
		margin-bottom: 0;
	}

	.product_list_widget ins, .product_list_widget del {
		padding-top: 10px;
		margin-right: 5px;
		display: inline-block;
	}

	.product_list_widget .star-rating {
		display: none;
	}

	.widget_product_search label, .widget_product_search #searchsubmit {
		display: none;
	}

	.widget_login {

	}

	.widget_login form a {
		display: none;
	}

	.widget_login form {
		margin-right: 20px;
		margin-bottom: 0;
	}

	.widget_login p {
		margin: 0;
	}

	.widget_login input {
		margin-bottom: 10px;
	}

	.widget_login label {
		font-family: "Droid Serif", Georgia, serif;
		font-size: 14px;
		font-style: italic;
		margin-bottom: 5px;
		font-weight: normal;
	}

	.product_list_widget li.empty {
		display: block;
	}

/**************************
	ORDER RECEIVED
**************************/

	.woocommerce-page h2 {
		color: #<?php echo $basecolor->bg['0']; ?>;
		font-family: '<?php echo $font; ?>';
		font-size: 20px;
		text-transform: uppercase;
		line-height: 24px;
		margin-bottom: 20px;
	}

	.woocommerce-page h3 {
		color: #<?php echo $basecolor->bg['0']; ?>;
		font-family: '<?php echo $font; ?>';
		font-size: 18px;
		text-transform: uppercase;
		line-height: 22px;
		margin-bottom: 20px;
	}

	.woocommerce-page .customer_details {
		margin-bottom: 30px;
	}

	.woocommerce-page .col-1 {
		width: 44%;
		float: left;
	}

	.woocommerce-checkout.woocommerce-page .col-1 {
		width: auto;
		float: none;
	}

	.woocommerce-page .col-2 {
		width: 44%;
		float: right;
	}

	.woocommerce-checkout.woocommerce-page .col-2 {
		width: auto;
		float: none;
	}

	.woocommerce-page .form-row label {
		margin-bottom: 10px;
	}

	.woocommerce-page .form-row input {
		margin: 0;
	}

	.shop_table.my_account_orders .button {
		margin-bottom: 0;
	}

	/********
		IE 7 ADJUSTS
	********/

	.ie7 #top .top-menu ul li {
		float: right;
	}

	.ie7 #header .main-menu ul li {
		float: left;

	}

	.ie7 #header .main-menu ul li .sub-menu {

		display: none;
	}

	.ie7 #header .main-menu ul li:hover .sub-menu {
		display: none;
	}
	
/***************/

	.price .from {
		font-size: 12px;
	}

/***************
	AVALIABLE DOWNLOADS
***************/

	.post .digital-downloads {
		margin-bottom: 25px;
		margin-left: 15px;
	}

	.post .digital-downloads li {
		font-size: 14px;
		line-height: 20px;
		padding-left: 30px;
		background: url("../images/download.png") no-repeat center left;
		padding-top: 3px;
	}

	.post .digital-downloads li a {
		color: #525351;
		text-decoration: none;	
	}

/**********
SUBSCRIPTION SUPPORT
**********/

	/*.products .product .add_to_cart_button.product_type_subscription {
		position: static;
		left: 0;
		top: 0;
		margin: 0 15px 15px 15px;
	}*/

	.clear-listing {
		clear: both;
		display: block;	
	}

	.product .price-wrapper .price.price-subscription {
		font-size: 13px;
		margin-right: 210px;
	}

	.product .price-wrapper .price.price-subscription span {
		font-size: 20px;
	}

	ul.products .product .price .subscription-recurrency-price,
	ul.products .product .price .subscription-time-price,
	ul.products .product .price .subscription-details-price {
		display: none;
	}
