<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * PsnApiBannedUser
 */
class PsnApiBannedUserException extends PlatformException {

	public function __construct($message, $code = 1229, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
