<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * UserCannotChangeEmail
 */
class UserCannotChangeEmailException extends PlatformException {

	public function __construct($message, $code = 222, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
