<?php

namespace BungieNetPlatform\Services\Destiny;

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
	 * @var \Cola\Set
	 */
	public $Values;
	
	public function __construct() {
		$this->Values = new \Cola\Set();
		$this->Details = new ActivityHistoryItemDetails();
	}

}
