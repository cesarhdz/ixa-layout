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

	const VERSION = '0.2';

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
		$path = static::getPath();

		// No $layout thorw new Exception
		if(! $path) throw new LayoutNotFoundException(static::$dirs);

		// Finelly return the path that will load the filter
		return $path;
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

	static function resetDirs(){
		static::$dirs = array();
	}

	static function getPath(){
		return (static::$layout) ? static::$layout->getPath() : null;
	}

	
	/**
	 * Register layout functionality as hook in WordPress
	 * 
	 * @return [type] [description]
	 */
	static function register($dir = 'layouts'){
		
		// require helper dirs
		require_once __DIR__ . '/../../layout_helper.php';


		// Dris must bu wrapped in slashes
		$dir = '/' . trim($dir, '/') . '/';

		// Adds stylessheetdir + layouts folder
		static::addDir(get_stylesheet_directory() . $dir);

		if(function_exists('add_filter'))
			add_filter( 'template_include', array('Ixa\Layout\LayoutFilter', 'apply'), 1);
	}
}