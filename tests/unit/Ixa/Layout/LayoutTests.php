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

	function testLayoutRetunsNewPath(){
		$newPath = Layout::apply($this->viewBasic);

		$this->assertNotNull($newPath, "Must return a Path");
		$this->assertTrue(is_string($newPath), "The new Path must be a string");
		$this->assertNotEquals($this->viewBasic, $newPath, "the new path is different than the view path");
	}

}
