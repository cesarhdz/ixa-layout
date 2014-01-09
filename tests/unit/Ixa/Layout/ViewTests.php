<?php namespace Ixa\Layout;

class ViewTests extends \PHPUnit_Framework_TestCase
{

	function testLoadContentOfTemplate(){
		$view = new View(SAMPLE_DIR . 'view_basic.php');
		$expected = load_sample('expected/view_basic.html');

		// Load View explicitly
		$view->load();

		$this->assertTrue($expected !== null);
		$this->assertEquals($expected, $view->getContent());
	}

}
