<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ValidationMissingFieldError
 */
class ValidationMissingFieldErrorException extends PlatformException {

	public function __construct($message, $code = 16, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
