<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ValidationProfanityError
 */
class ValidationProfanityErrorException extends PlatformException {

	public function __construct($message, $code = 33, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
