<?php namespace Ixa\Layout;

/**
 * File Loader
 *
 * Helper class that allows loading files
 * is ready to implement Mustache_Loader interface
 * so we can have control over loading partials
 * 
 */
class LayoutFilter
{
	protected static $view;
	protected static $layout;
	
	protected static $dirs = array();

	static function apply($viewPath){
		// Initialize layout
		static::initLayout();
		
		// Save View
		static::setView($viewPath);

		// Load view
		static::$view->load();

		// Return path to new layout
		return static::getPath();
	}

	protected static function initLayout(){
		static::$layout = new Layout(static::$dirs);
	}

	static function setView($view){
		static::$view = new View($view);
	}

	static function getView(){
		return static::$view;
	}

	static function setName($name){
		if(static::$layout){
			static::initLayout();
		}

		static::$layout->setName($name);
	}

	
	static function getViewContent(){
		return (static::$view) ? static::$view->getContent() : null;
	}

	static function addDir($dir){
		static::$dirs[] = $dir;
	}

	static function getPath(){
		return (static::$layout) ? static::$layout->getPath() : null;
	}
}