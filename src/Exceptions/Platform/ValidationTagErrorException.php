<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ValidationTagError
 */
class ValidationTagErrorException extends PlatformException {

	public function __construct($message, $code = 32, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
