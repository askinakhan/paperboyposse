<?php
$options = array(
	array(
		"name" => "Sidebar Manager",
		"type" => "title",
		"color" => "gray"
	),
		
	
	array(
	"name" => "Custom Sidebars",
	"type" => "start"
	),
	
		array(
		"name" => "Custom Favicon",
		"desc" => "Upload your own .ico file to use as favicon",
		"id" => "sidebars",
		"default" => "",
		"type" => "sidebar",
		),
			
	array(
	"type" => "end"
	),
		
	/*MARK*/
);
return array(
	'auto' => true,
	'name' => 'sidebar',
	'options' => $options
);