<?php

namespace BungieNetPlatform\Services\Destiny;

use Cola\Set;

/**
 * ActivityHistoryItem
 */
class ActivityHistoryItem extends \Cola\Object {

	/**
	 * @var \DateTime
	 */
	public $Period;
	
	/**
	 * @var ActivityHistoryItemDetails
	 */
	public $Details;
	
	/**
	 * @var Set|ActivityHistoryItemStat[]
	 */
	public $Values;
	
	public function __construct() {
		$this->Values = new Set();
		$this->Details = new ActivityHistoryItemDetails();
	}

}
