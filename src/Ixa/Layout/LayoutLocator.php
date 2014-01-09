<?php namespace Ixa\Layout;

/**
 * File Loader
 *
 * Helper class that allows loading files
 * is ready to implement Mustache_Loader interface
 * so we can have control over loading partials
 * 
 */
class LayoutLocator
{
	protected $customDirs;
	protected $layout;

	protected $path;

	const DEFAULT_FOLDER = 'layouts';

	function __construct($layout, $customDirs = array()){
		$this->layout = $layout;
		$this->customDirs = $customDirs;

		$this->find();
	}

	function exists(){
		return ($this->path != null) ? true : false;
	}

	function getPath(){
		return $this->path;
	}

	function getPaths(){
		$paths = array();

		if(function_exists("get_stylesheet_directory"))
			$paths[] = get_stylesheet_directory() . static::DEFAULT_FOLDER;


		if(is_array($this->customDirs) && count($this->customDirs))
			$paths = array_merge($paths, $this->customDirs);

		return $paths;
	}


	private function find(){
		foreach ($this->getPaths() as $dir) {
			$path = $dir . '/' . $this->layout . '.php';

			if(is_readable($path)){
				$this->path = $path;
			}
		}
	}
}