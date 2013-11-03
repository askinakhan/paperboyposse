<?php
$options = array(
	array(
		"name" => "Fonts",
		"type" => "title",
		"color" => "cyan"
	),
		
	/*** # Custom Fonts# ***/
	
	array(
	"name" => "Custom Fonts",
	"type" => "start"
	),
		array(
		"name" => "Use a Google Fonts instead?",
		"desc" => "Select a font to use here",
		"id" => "custom_font",
		"default" => "",
		"options" => array(
			"nevisBold" => "Nevis (default)",
						"orange" => "Fruit Orange"
		),
		"type" => "select",
		),
		
	
	array(
	"type" => "end"
	),


	/*MARK*/
);
return array(
	'auto' => true,
	'name' => 'fonts',
	'options' => $options
);