<?php

namespace BungieNetPlatform\Tests;

use BungieNetPlatform\Services\Destiny\Manifest\Hash;

/**
 * HashTest
 */
class HashTest extends \PHPUnit_Framework_TestCase {

	public function testCreation(){
		
		$h1 = new Hash('37845622');
		$this->assertEquals('37845622', (string)$h1);
		
		$h2 = new Hash(37845622);
		$this->assertEquals('37845622', (string)$h2);
		
	}
	
	public function testOverflow(){
		
		//Large enough to overflow on 64 bit
		$h = new Hash('23014334875693846598324656075');
		
		$this->assertEquals('23014334875693846598324656075', (string)$h);
		$this->assertTrue($h->willOverflowAsInt());
		$this->assertEquals(\PHP_INT_MAX, $h->toInt());
		
	}
	
	public function testEquals(){
		
		$h1 = new Hash('23014334875693846598324656075');
		$h2 = new Hash('23014334875693846598324656074');
		$h3 = new Hash('23014334875693846598324656074');
		
		$this->assertTrue($h2->equals($h3));
		$this->assertFalse($h1->equals($h2));
		
	}

}
