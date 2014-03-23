<?php
/*
Plugin Name: Layout
Version: 0.1.1
Description: Simple layout features added to WordPress
Author: Cesar Hernandez
Author URI: http://cesarhdz.com 
*/

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

/**
 * WordPress Support
 */

// Adding template dir layoutFilter
if(function_exists('get_stylesheet_directory')){
	LayoutFilter::addDir(get_stylesheet_directory() . '/layouts/');
}

// Filter before including template added
if(function_exists('add_filter')){
	add_filter( 'template_include', array('Ixa\Layout\LayoutFilter', 'apply'), 1);
}
