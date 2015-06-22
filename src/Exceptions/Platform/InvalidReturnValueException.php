<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * InvalidReturnValue
 */
class InvalidReturnValueException extends PlatformException {

	public function __construct($message, $code = 23, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
