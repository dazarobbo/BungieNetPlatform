<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupMembershipInsufficientPrivileges
 */
class GroupMembershipInsufficientPrivilegesException extends PlatformException {

	public function __construct($message, $code = 603, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
