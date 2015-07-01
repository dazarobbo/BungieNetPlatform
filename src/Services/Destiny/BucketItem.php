<?php

namespace BungieNetPlatform\Services\Destiny;

use Cola\ArrayList;

/**
 * BucketItem
 */
class BucketItem extends \Cola\Object {

	/**
	 * @var ArrayList
	 */
	public $Items;
	
	/**
	 * @var Manifest\Hash
	 */
	public $Hash;
	
	public function __construct() {
		$this->Items = new ArrayList();
	}

}
