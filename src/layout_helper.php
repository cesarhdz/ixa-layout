<?php
use Ixa\Layout\LayoutFilter;


// Yield View Content
if(!function_exists('yield_content')){
	function yield_content(){
		echo LayoutFilter::getViewContent();
	}
}


if(!function_exists('layout')){
	function layout($layout){
		LayoutFilter::setName($layout);
	}
}
