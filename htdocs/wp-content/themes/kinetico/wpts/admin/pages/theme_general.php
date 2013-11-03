<?php
$options = array(
	array(
		"name" => "General",
		"type" => "title",
		"color" => "cyan"
	),
		
	/*** # IMAGES# ***/
	
	array(
	"name" => "Images",
	"type" => "start"
	),
	
		array(
		"name" => "Custom Favicon",
		"desc" => "Upload your own .ico file to use as favicon",
		"id" => "favicon_url",
		"default" => "",
		"type" => "upload",
		),
		
		array(
		"name" => "Custom Logo",
		"desc" => "Upload your own logo instead default",
		"id" => "logo_url",
		"default" => "",
		"type" => "upload",
		),
		
	
	array(
	"type" => "end"
	),

	
	/*** # FOOTER# ***/
	
	array(
	"name" => "Footer Text",
	"type" => "start"
	),
	
		array(
			"name" => "Footer Text",
			"desc" => "Text displayed at footer.",
			"id" => "footer_text",
			"default" => "COPYRIGHT 2012 - <a href='#'>KINETICO</a>",
			"type" => "text",
			),
	
	array(
	"type" => "end"
	),

	
	/*** # Contact Email# ***/
	
	array(
	"name" => "Contact Email",
	"type" => "start"
	),
	
		array(
			"name" => "Mail Address",
			"desc" => "Your email to receive contact messages from theme.",
			"id" => "mail_address",
			"default" => "",
			"type" => "text",
			),
	
	array(
	"type" => "end"
	),

	array(
	"name" => "Blog Title",
	"type" => "start"
	),
		array(
			"name" => "Blog Title",
			"desc" => "Define blog title.",
			"id" => "blog_title",
			"default" => "BLOG",
			"type" => "text",
			),
			
			array(
			"name" => "Blog Description",
			"desc" => "Set blog description here",
			"id" => "blog_desc",
			"default" => "Writing about awesomness",
			"type" => "text",
			),
		
	array(
	"type" => "end"
	),


	array(
	"name" => "Custom CSS Rules",
	"type" => "start"
	),

		array(
			"name" => "Custom CSS Rules",
			"desc" => "Add custom CSS rules here",
			"id" => "css_custom",
			"default" => "",
			"type" => "textarea",
			),

	array(
	"type" => "end"
	),
	
	
	/*MARK*/
);
return array(
	'auto' => true,
	'name' => 'general',
	'options' => $options
);