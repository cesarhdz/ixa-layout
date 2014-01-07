<?php

require dirname(__FILE__) . '/../vendor/autoload.php';


define('SAMPLE_DIR', dirname(__FILE__) . '/sample/');


// Helper to load samples
function load_sample($sample){
	
	$filename = SAMPLE_DIR . $sample;

	if(is_readable($filename))
		return file_get_contents($filename);

}