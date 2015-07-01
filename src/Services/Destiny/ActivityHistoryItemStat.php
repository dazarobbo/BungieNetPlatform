<?php

namespace BungieNetPlatform\Services\Destiny;

/**
 * ActivityHistoryItemStat
 */
class ActivityHistoryItemStat extends \Cola\Object {

	/**
	 * @var string
	 */
	public $Id;
	
	/**
	 * @var ActivityHistoryItemStatBasic
	 */
	public $Basic;
	
	public function __construct() {
	}
	
	public function __toString() {
		return $this->Basic->DisplayValue;
	}

}
