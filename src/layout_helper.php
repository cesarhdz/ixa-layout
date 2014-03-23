<?php
use Ixa\Layout\LayoutFilter;

// Lod composer autoload if exists
$composer_autoload = dirname(__FILE__) . '/vendor/autoload.php';

if(is_readable($composer_autoload))	require $composer_autoload;



// Yield View Content
if(!function_exists('yield_content')){
	function yield_content(){
		echo LayoutFilter::getViewContent();
	}
}


if(!function_exists('layout_name')){
	function layout_name($name){
		LayoutFilter::setName($name);
	}
}
