<?php namespace Ixa\Layout;

class LayoutFilterTests extends \PHPUnit_Framework_TestCase
{

	var $viewBasic;

	function setUp(){
		$this->viewBasic = SAMPLE_DIR . 'view_basic.php';
	}

	function testLayoutLoadView(){
		$path = LayoutFilter::apply($this->viewBasic);


		$this->assertNotNull($this->viewBasic, $path);
		$this->assertInstanceOf('Ixa\Layout\View', LayoutFilter::getView());
	}
}
