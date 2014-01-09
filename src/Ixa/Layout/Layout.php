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
	protected static $path;

	const DEFAULT_LAYOUT = 'default';

	static function apply($viewPath){
		// Save View
		static::setView($viewPath);

		// Load view
		static::$view->load();

		// try to guess layout path
		static::guessPath();

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

	
	static function getPath(){
		return static::$path;
	}

	protected static function guessPath(){
		static::setPath(static::DEFAULT_LAYOUT);
	}
}