<?php

namespace BungieNetPlatform\Services\Destiny;

/**
 * BucketItem
 */
class BucketItem extends \Cola\Object {

	/**
	 * @var \Cola\Set
	 */
	public $Items;
	
	/**
	 * @var Manifest\Hash
	 */
	public $Hash;
	
	public function __construct() {
		$this->Items = new \Cola\Set();
	}

}
