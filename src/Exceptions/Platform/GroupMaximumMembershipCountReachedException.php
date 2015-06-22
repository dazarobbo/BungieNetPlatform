<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupMaximumMembershipCountReached
 */
class GroupMaximumMembershipCountReachedException extends PlatformException {

	public function __construct($message, $code = 629, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
