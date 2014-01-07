<?php namespace Ixa\Layout;

class ViewTests extends \PHPUnit_Framework_TestCase
{

	function testCanGetFullPathOfView(){
		$view = new View(SAMPLE_DIR, 'view_basic');

		$this->assertEquals(SAMPLE_DIR . 'view_basic.php', $view->getFullPath());
	}

}
