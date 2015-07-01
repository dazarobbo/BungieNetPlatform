<?php

namespace BungieNetPlatform\Services\User;

/**
 * UserContext
 */
class UserContext extends \Cola\Object {

	/**
	 * @var bool
	 */
	public $IsFollowing;
	
	/**
	 * @var IgnoreStatus
	 */
	public $IgnoreStatus;
	
	public function __construct() {
		
	}

}
