<?php

namespace BungieNetPlatform\Tests;

use BungieNetPlatform\Platform;
use BungieNetPlatform\Enums\BungieMembershipType;
use BungieNetPlatform\Enums\DestinyActivityModeType;

/**
 * PlatformTests
 */
class PlatformTests extends \PHPUnit_Framework_TestCase {

	protected $_Platform;
	
	protected function setUp(){
		$this->_Platform = new Platform(API_TEST_KEY);
	}

	public function testGetAccount(){
		
		$r = $this->_Platform->DestinyService->getAccount(
				BungieMembershipType::TIGER_PSN(),
				'4611686018429501017');
		
		$this->assertEquals('4611686018429501017', $r->Account->MembershipId);
		
	}
	
	public function testGetActivityHistory(){
		
		$r = $this->_Platform->DestinyService->getActivityHistory(
				BungieMembershipType::TIGER_PSN(),
				'4611686018428939884',
				'2305843009214854213',
				DestinyActivityModeType::NONE());
		
		$this->assertEquals(1, $r->getInnerResponse()->getErrorCode());
		
	}

}
