<?php namespace Ixa\Layout;

class LayoutTests extends \PHPUnit_Framework_TestCase
{

	var $viewBasic;

	function setUp(){
		$this->viewBasic = SAMPLE_DIR . 'view_basic.php';
	}

	function testLayoutLoadView(){
		Layout::apply($this->viewBasic);


		$this->assertInstanceOf('Ixa\Layout\View', Layout::getView());

	}

	function testNewPathIsAValidFile(){
		Layout::addDir(SAMPLE_DIR . 'layouts/');
		Layout::setName('custom');

		$newPath = Layout::getPath();
		
		$this->assertNotNull($newPath, "Must return a Path");
		$this->assertFileExists($newPath);
	}
}
