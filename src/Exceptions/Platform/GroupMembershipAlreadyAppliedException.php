<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupMembershipAlreadyApplied
 */
class GroupMembershipAlreadyAppliedException extends PlatformException {

	public function __construct($message, $code = 602, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
