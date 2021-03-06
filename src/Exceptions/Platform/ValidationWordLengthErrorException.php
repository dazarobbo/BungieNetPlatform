<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ValidationWordLengthError
 */
class ValidationWordLengthErrorException extends PlatformException {

	public function __construct($message, $code = 39, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
