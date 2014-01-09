<?php namespace Ixa\Layout;

/**
 * File Loader
 *
 * Helper class that allows loading files
 * is ready to implement Mustache_Loader interface
 * so we can have control over loading partials
 * @deprecated Layout can handle by itself
 */
class LayoutLocator
{
	protected $dirs;
	protected $layout;

	protected $path;

	const DEFAULT_FOLDER = 'layouts';

	function __construct($layout, $dirs = array()){
		$this->layout = $layout;
		$this->dirs = $dirs;

		$this->find();
	}

	function exists(){
		return ($this->path != null) ? true : false;
	}

	function getPath(){
		return $this->path;
	}

	private function find(){
		foreach ($this->dirs as $dir) {
			$path = $dir . '/' . $this->layout . '.php';

			if(is_readable($path)){
				$this->path = $path;
			}
		}
	}
}