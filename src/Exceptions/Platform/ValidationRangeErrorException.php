<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ValidationRangeError
 */
class ValidationRangeErrorException extends PlatformException {

	public function __construct($message, $code = 29, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
