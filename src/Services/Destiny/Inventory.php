<?php

namespace BungieNetPlatform\Services\Destiny;

use Cola\Set;

/**
 * Inventory
 */
class Inventory extends \Cola\Object {

	/**
	 * @var Set
	 */
	public $Buckets;
	
	/**
	 * @var Set
	 */
	public $Currencies;
	
	public function __construct() {
		$this->Buckets = new Set();
		$this->Currencies = new Set();
	}

}
