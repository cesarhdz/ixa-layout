<?php namespace Ixa\Layout;

class LayoutLocatorTests extends \PHPUnit_Framework_TestCase
{

	function testLayoutLocatorCanFindDefaultLayout(){

		$layout = new LayoutLocator('default', array(SAMPLE_DIR . 'layouts/'));

		var_dump($layout->getPath());

		$this->assertTrue($layout->exists());
	}

}
