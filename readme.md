<?php
 
require 'gfm.php';
 
class GFMTest extends PHPUnit_Framework_TestCase{
	
	public function testShouldNotTouchSingleUnderscoresInsideWords(){
		$this->assertEquals("foo_bar", gfm("foo_bar"));
	}
 
	public function testShouldNotTouchUnderscoresInCodeBlocks(){
		$this->assertEquals("    foo_bar_baz", gfm("    foo_bar_baz"));
	}
 
	public function testShouldNotTouchUnderscoresInPreBlocks(){
		$this->assertEquals("\n\n<pre>\nfoo_bar_baz\n</pre>", gfm("<pre>\nfoo_bar_baz\n</pre>"));
	}
 
	public function testShouldNotTreatPreBlocksWithPreTextDifferently(){
		$a = "\n\n<pre>\nthis is `a\\_test` and this\\_too\n</pre>";
		$b = "hmm<pre>\nthis is `a\\_test` and this\\_too\n</pre>";
		$this->assertEquals( substr(gfm($a), 2), substr(gfm($b), 3) );
	}
 
	public function testShouldEscapeTwoOrMoreUnderscoresInsideWords(){
		$this->assertEquals( "foo\\_bar\\_baz", gfm("foo_bar_baz") );
	}
 
	public function testShouldTurnNewlinesIntoBrTagsInSimpleCases(){
		$this->assertEquals( "foo  \nbar", gfm("foo\nbar") );
	}
 
	public function testShouldConvertNewlinesInAllGroups(){
		$this->assertEquals( "apple  \npear  \norange\n\nruby  \npython  \nerlang",
							 gfm("apple\npear\norange\n\nruby\npython\nerlang") );
	}
 
	public function testShouldConvertNewlinesInEvenLongGroups(){
		$this->assertEquals( "apple  \npear  \norange  \nbanana\n\nruby  \npython  \nerlang",
							 gfm("apple\npear\norange\nbanana\n\nruby\npython\nerlang") );
	}
 
	public function testShouldNotConvertNewlinesInLists(){
		$this->assertEquals( "# foo\n# bar", gfm("# foo\n# bar") );
		$this->assertEquals( "* foo\n* bar", gfm("* foo\n* bar") );
	}
}