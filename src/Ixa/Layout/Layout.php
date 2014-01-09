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

	const DEFAULT_NAME = 'default';

	function __construct($dirs = array()){
		$this->dirs = $dirs;
	}


	function setName($name){
		$this->name = $name;
	}


	function getPath(){
		$names = $this->getPossibleNames();


		foreach ($names as $name) {
			$layout = new LayoutLocator($name, $this->dirs);

			if($layout->exists($layout)){
				return $layout->getPath();
			}
		}
	}

	protected function getPossibleNames(){
		$names = array();

		if(isset($this->name))
			$names[] = $this->name;

		$names[] = static::DEFAULT_NAME;

		return $names;
	}
}