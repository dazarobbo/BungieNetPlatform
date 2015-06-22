<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * UserMalformedMembershipId
 */
class UserMalformedMembershipIdException extends PlatformException {

	public function __construct($message, $code = 204, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
