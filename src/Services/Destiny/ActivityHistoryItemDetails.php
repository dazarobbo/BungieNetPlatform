<?php

namespace BungieNetPlatform\Services\Destiny;

use BungieNetPlatform\Enums\DestinyActivityModeType;

/**
 * ActivityHistoryItemDetails
 */
class ActivityHistoryItemDetails extends \Cola\Object {

	/**
	 * @var int
	 */
	public $ReferenceId;
	
	/**
	 * @var string
	 */
	public $InstanceId;
	
	/**
	 * @var DestinyActivityModeType
	 */
	public $Mode;
	
	public function __construct() {
	}
	
	public function __toString() {
		return (string)$this->InstanceId;
	}

}
