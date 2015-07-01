<?php

namespace BungieNetPlatform\Services\User;

use BungieNetPlatform\Services\User\IgnoreStatus;

/**
 * IgnoreStatus
 */
class IgnoreStatus extends \Cola\Object {

	/**
	 * @var bool
	 */
	public $IsIgnored;

	/**
	 * @var IgnoreStatus
	 */
	public $IgnoreFlags;
	
	public function __construct() {
		
	}

}
