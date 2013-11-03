<?php
$options = array(
	array(
		"name" => "Colors",
		"type" => "title",
		"color" => "red"
	),
		
	/*** # IMAGES# ***/
	
	array(
	"name" => "Color Schemes",
	"type" => "start"
	),
	
		array(
		"name" => "Color Schemes",
		"desc" => "Select Built in color schemes.",
		"id" => "color",
		"default" => "orange",
		"options" => array(
			"orange" => "Fruit Orange", "blue"=> "Sweet Blue", "pink" => "Nice Pink", 
			"green" => "Farm Green", "yellow" => "Shock Yellow", "dark" => "Just Dark and Gray", "red" => "Wine Red",
		),
		"type" => "select",
		),
		
		array(
		"name" => "Custom Base Color",
		"desc" => "Select a Custom Base Color.",
		"id" => "custom_color",
		"default" => "",
		"type" => "color",
		),
	
	array(
	"type" => "end"
	),
	
	array(
	"name" => "Background",
	"type" => "start"
	),
	
		array(
		"name" => "Built-in Patterns",
		"desc" => "Select Built in pattern to use as background.",
		"id" => "pattern",
		"default" => "1",
		"options" => array(
			"1" => "Wood", 
			"2" => "Dark Dust",
			"3" => "Dark Quad",
			"4" => "White Clean"
		),
		"type" => "select",
		),
		
		array(
		"name" => "Custom Background Image",
		"desc" => "Upload a custom background image.",
		"id" => "custom_background",
		"default" => "",
		"type" => "upload",
		),
		
		array(
		"name" => "Use fullscreen background?",
		"desc" => "If you check this, your background will cover whole screen.",
		"id" => "is_full",
		"default" => false,
		"type" => "toggle",
		),
		
		array(
		"name" => "Only use color on background?",
		"desc" => "If you check this, your background won't be a image but a solid color instead.",
		"id" => "use_color",
		"default" => false,
		"type" => "toggle",
		),
		
		array(
		"name" => "Custom Background Color",
		"desc" => "Check the field above and define here the custom color to use as background.",
		"id" => "custom_background_color",
		"default" => "cccccc",
		"type" => "color",
		),
	
	array(
	"type" => "end"
	),

	array(
	"name" => "Change Font",
	"type" => "start"
	),
		array(
		"name" => "Enable cyrillic support to header font?",
		"desc" => "If you check this, we'll use a Google Font that supports cyrillic letters instead Nevis.",
		"id" => "use_cyrillic",
		"default" => false,
		"type" => "toggle",
		),
		
	array(
	"type" => "end"
	),

	
	/*MARK*/
);
return array(
	'auto' => true,
	'name' => 'colors',
	'options' => $options
);