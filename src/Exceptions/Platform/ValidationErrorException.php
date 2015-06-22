<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ValidationError
 */
class ValidationErrorException extends PlatformException {

	public function __construct($message, $code = 15, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
