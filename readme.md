</h1>Usage</h1>


<?php
public function testShouldNotTouchSingleUnderscoresInsideWords(){
	$this->assertEquals("foo_bar", gfm("foo_bar"));
}
?>

