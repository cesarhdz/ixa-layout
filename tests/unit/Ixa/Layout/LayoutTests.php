<?php namespace Ixa\Layout;

class LayoutTests extends \PHPUnit_Framework_TestCase
{

	function testLayoutCanFindDefaultLayout(){
		$layout = new Layout(array(SAMPLE_DIR . 'layouts/'));

		$this->assertFileExists($layout->getPath());
	}

	function testNewPathIsAValidFile(){
		$layout = new Layout('custom', array(SAMPLE_DIR . 'layouts/'));
		$newPath = $layout->getPath();
		
		$this->assertNotNull($newPath, "Must return a Path");
		$this->assertFileExists($newPath);
	}
}
