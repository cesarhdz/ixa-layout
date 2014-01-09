<?php namespace Ixa\Layout;

class LayoutFilterTests extends \PHPUnit_Framework_TestCase
{

	var $viewBasic;

	function setUp(){
		$this->viewBasic = SAMPLE_DIR . 'view_basic.php';
	}

	function testLayoutLoadView(){
		LayoutFilter::apply($this->viewBasic);


		$this->assertInstanceOf('Ixa\Layout\View', LayoutFilter::getView());

	}

	function testNewPathIsAValidFile(){
		LayoutFilter::addDir(SAMPLE_DIR . 'layouts/');
		LayoutFilter::setName('custom');

		$newPath = LayoutFilter::getPath();
		
		$this->assertNotNull($newPath, "Must return a Path");
		$this->assertFileExists($newPath);
	}
}
