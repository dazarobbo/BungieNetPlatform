<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ValidationLengthError
 */
class ValidationLengthErrorException extends PlatformException {

	public function __construct($message, $code = 28, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
