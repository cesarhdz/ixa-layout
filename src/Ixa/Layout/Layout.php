<?php namespace Ixa\Layout;

/**
 * File Loader
 *
 * Helper class that allows loading files
 * is ready to implement Mustache_Loader interface
 * so we can have control over loading partials
 * 
 */
class Layout
{
	protected $name;
	protected $dirs;
	protected $path;

	const DEFAULT_NAME = 'default';

	function __construct($dirs = array()){
		$this->dirs = $dirs;
	}


	function setName($name){
		$this->name = $name;
	}


	function getPath(){
		if(!$this->path) $this->guessPath();

		return $this->path;
	}

	protected function getPossibleNames(){
		$names = array();

		if(isset($this->name))
			$names[] = $this->name;

		$names[] = static::DEFAULT_NAME;

		return $names;
	}


	protected function guessPath(){
		foreach ($this->dirs as $dir) {
			if($this->findLayoutInDir($dir)) return;
		}
	}


	protected function findLayoutInDir($dir){
		foreach ($this->getPossibleNames() as $name) {
			$path = $dir . '/' . $name . '.php';

			// If we find the layout, we set the path
			if(is_readable($path)){
				$this->path = $path;
				return true;
			}
		}
	}
}