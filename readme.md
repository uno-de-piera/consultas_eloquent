</h1>Usage</h1>


<?php
class Test extends PHPUnit_Framework_TestCase{
	
	public function testShouldNotTouchSingleUnderscoresInsideWords(){
		$this->assertEquals("foo_bar", gfm("foo_bar"));
	}

}
?>
