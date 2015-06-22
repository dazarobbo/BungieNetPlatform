<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupInvalidMembershipId
 */
class GroupInvalidMembershipIdException extends PlatformException {

	public function __construct($message, $code = 608, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
