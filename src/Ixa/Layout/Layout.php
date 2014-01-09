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
	protected static $view;
	
	protected static $name;
	protected static $dirs = array();

	const DEFAULT_LAYOUT = 'default';

	static function apply($viewPath){
		// Save View
		static::setView($viewPath);

		// Load view
		static::$view->load();

		// Return path to new layout
		return static::getPath();
	}

	static function setView($view){
		static::$view = new View($view);
	}

	static function getView(){
		return static::$view;
	}

	static function setPath($path){
		static::$path = $path;
	}

	static function setName($name){
		static::$name = $name;
	}

	
	static function getViewContent(){
		if(static::$view){
			return static::$view->getContent();
		}
	}


	static function addDir($dir){
		static::$dirs[] = $dir;
	}

	static function getPath(){
		$names = static::getPossibleNames();

		foreach ($names as $name) {
			$layout = new LayoutLocator($name, static::$dirs);

			if($layout->exists($layout)){
				return $layout->getPath();
			}
		}
	}


	protected static function getPossibleNames(){
		$names = array();

		if(isset(static::$name))
			$names[] = static::$name;

		$names[] = static::DEFAULT_LAYOUT;

		return $names;
	}
}