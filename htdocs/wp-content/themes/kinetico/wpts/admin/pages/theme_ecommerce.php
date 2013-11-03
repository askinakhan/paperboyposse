<?php
$options = array(
	array(
		"name" => "eCommerce",
		"type" => "title",
		"color" => "blue"
	),
		
	/*** # IMAGES# ***/
	
	array(
	"name" => "Configs",
	"type" => "start"
	),
		array(
			"name" => "Display how many products per page?",
			"desc" => "Define a number to products that will be displayed at each page.",
			"id" => "products_number",
			"default" => "12",
			"type" => "text",
			),
			
			array(
			"name" => "Shop Description",
			"desc" => "Set shop subtitle text here.",
			"id" => "shop_desc",
			"default" => "We sell awesome stuff",
			"type" => "text",
			),
		
	array(
	"type" => "end"
	),

	
	
	
	/*MARK*/
);
return array(
	'auto' => true,
	'name' => 'ecommerce',
	'options' => $options
);