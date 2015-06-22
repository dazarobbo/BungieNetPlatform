<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupMembershipNotLoggedIn
 */
class GroupMembershipNotLoggedInException extends PlatformException {

	public function __construct($message, $code = 618, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
