<?php

namespace BungieNetPlatform\Tests;

use BungieNetPlatform\Services\Destiny\Manifest\Hash;
use Cola\Functions\Number;

/**
 * HashTest
 */
class HashTest extends \PHPUnit_Framework_TestCase {

	public function testCreation(){
		
		$h1 = new Hash('37845622');
		$this->assertEquals('37845622', \strval($h1));
		
		$h2 = new Hash(37845622);
		$this->assertEquals('37845622', \strval($h2));
		
	}
	
	public function testOverflow(){
		
		//Large enough to overflow on 64 bit arch
		$h = new Hash('23014334875693846598324656075');
		
		$this->assertEquals('23014334875693846598324656075', \strval($h));
		$this->assertTrue($h->willOverflowAsInt());
		$this->assertEquals(\PHP_INT_MAX, $h->toInt());
		
	}
	
	public function testComparison(){
		
		$h1 = new Hash('23014334875693846598324656075');
		$h2 = new Hash('23014334875693846598324656074');
		$h3 = new Hash('23014334875693846598324656074');
		
		$this->assertEquals(Number::COMPARISON_GREATER_THAN, $h1->compareTo($h2));
		$this->assertEquals(Number::COMPARISON_EQUAL, $h2->compareTo($h2));
		
	}

}
