<?php namespace Ixa\Layout;

/**
 * File Loader
 *
 * Helper class that allows loading files
 * is ready to implement Mustache_Loader interface
 * so we can have control over loading partials
 * 
 */
class Buffer
{
	protected $path;

	function __construct($path){
		$this->path = $path;
	}

	function load(){
		// Initialize buffer
		$this->init();

		// Include path
		$this->includeFile();
		
		// Return content
		return $this->getFileContent();
	}

	private function init(){
		ob_start();
	}

	private function includeFile(){
		include $this->path;
	}

	private function getFileContent(){
		// Grab content
		$out = ob_get_contents();

		// Clean buffer
		ob_end_clean();

		// Return the object flushed
		return $out;
	}
}