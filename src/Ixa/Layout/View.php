<?php namespace Ixa\Layout;

class View{

	protected $content;
	protected $basePath;
	protected $view;

	static $ext = '.php';

	function __construct($basePath, $view){

		$this->basePath = $basePath;
		$this->view = $view;

	}

	function getContent(){
		return $this->content;
	}


	function getFullPath(){
		return $this->basePath . $this->view . self::$ext;
	}


}