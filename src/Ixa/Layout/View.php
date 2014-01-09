<?php namespace Ixa\Layout;

class View{

	protected $content;
	protected $path;

	function __construct($path){
		$this->path = $path;
	}

	function getContent(){
		return $this->content;
	}


	function load(){
		//@TODO Add to Dependency Injection
		$buffer = new Buffer($this->path);

		$this->content = $buffer->load();
	}
}