<?php namespace Ixa\Layout;

class BufferTests extends \PHPUnit_Framework_TestCase
{

	function testCanGetFullPathOfView(){
		$buffer = new Buffer(SAMPLE_DIR . '/view_basic.php');
		$expected = load_sample('expected/view_basic.html');

		$this->assertEquals($expected, $buffer->load());
	}

}
