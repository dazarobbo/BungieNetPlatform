<?php

namespace BungieNetPlatform\Services\Destiny;

/**
 * Equipment
 */
class Equipment extends \Cola\Object {

	/**
	 * @var Manifest\Hash
	 */
	public $Hash;
	
	/**
	 * @var \Cola\Set
	 */
	public $Dyes;
	
	public function __construct() {
		$this->Dyes = new \Cola\Set();
	}

}
