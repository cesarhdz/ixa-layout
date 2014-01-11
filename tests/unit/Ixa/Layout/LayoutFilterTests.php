<?php namespace Ixa\Layout;

class LayoutFilterTests extends \PHPUnit_Framework_TestCase
{

	var $viewBasic;


	function setUp(){
		LayoutFilter::resetDirs();
	}

	function setDefaultDir(){
		LayoutFilter::addDir(SAMPLE_DIR . '/layouts/');
		$this->viewBasic = SAMPLE_DIR . 'view_basic.php';
	}

	function testLayoutLoadView(){
		$this->setDefaultDir();
		$path = LayoutFilter::apply($this->viewBasic);

		$this->assertNotNull($path);
		$this->assertInstanceOf('Ixa\Layout\View', LayoutFilter::getView());
	}

	function testYieldContent(){
		$this->setDefaultDir();
		$path = LayoutFilter::apply($this->viewBasic);

		ob_start();

		require $path;

		$out = ob_get_contents();

		ob_end_clean();

		$this->assertContains('<h1>Post Title</h1>', $out);
		$this->assertContains('<p>Post Content</p>', $out);

		$this->assertEquals($out, load_sample('expected/layout_basic.html'));

	}


	function testIfNoLayoutIsFoundTriggerException(){
		$this->setExpectedException('Ixa\Layout\LayoutNotFoundException');

		// View exists but layout folder doesn't exists, so we wexpect the Exception
		LayoutFilter::addDir(SAMPLE_DIR . '/noLayout/');
		LayoutFilter::apply(SAMPLE_DIR . 'view_basic.php');
	}
}
