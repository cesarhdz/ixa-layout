<?php namespace Ixa\Layout;

/**
 * Layout
 *
 */
class Layout
{
	protected $dirs;
	
	protected $name;
	protected $path;

	const DEFAULT_NAME = 'default';

	function __construct($name, $dirs = array()){
		if(is_string($name) && $name)
			$this->setName($name);

		$dirs = (is_array($name)) ? $name : $dirs;

		$this->setDirs($dirs);
	}


	function setName($name){
		$this->name = $name;
	}


	function getPath(){
		if(!$this->path) $this->guessPath();

		return $this->path;
	}

	function setDirs(array $dirs){
		$this->dirs = $dirs;
	}

	protected function getPossibleNames(){
		return (isset($this->name)) 
			? array($this->name, static::DEFAULT_NAME)
			: array(static::DEFAULT_NAME);
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