<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * AuthenticationInvalid
 */
class AuthenticationInvalidException extends PlatformException {

	public function __construct($message, $code = 10, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
