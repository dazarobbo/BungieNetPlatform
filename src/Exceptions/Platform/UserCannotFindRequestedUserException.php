<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * UserCannotFindRequestedUser
 */
class UserCannotFindRequestedUserException extends PlatformException {

	public function __construct($message, $code = 205, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
