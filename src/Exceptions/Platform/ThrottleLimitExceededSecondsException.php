<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ThrottleLimitExceededSeconds
 */
class ThrottleLimitExceededSecondsException extends PlatformException {

	public function __construct($message, $code = 37, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
