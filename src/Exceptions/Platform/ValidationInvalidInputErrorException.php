<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ValidationInvalidInputError
 */
class ValidationInvalidInputErrorException extends PlatformException {

	public function __construct($message, $code = 17, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
