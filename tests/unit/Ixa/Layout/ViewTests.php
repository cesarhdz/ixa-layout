<?php namespace Ixa\Layout;

class ViewTests extends \PHPUnit_Framework_TestCase
{

	function testCanGetFullPathOfView(){
		$view = new View(SAMPLE_DIR, 'view');

		$this->assertEquals(SAMPLE_DIR . 'view.php', $view->getFullPath());
	}

	function testLoadContentOfTemplate(){
		$view = new View(SAMPLE_DIR, 'view_basic');
		$expected = load_sample('expected/view_basic.html');

		$view->load();

		$this->assertTrue($expected !== null);
		$this->assertEquals($expected, $view->getContent());
	}

}
