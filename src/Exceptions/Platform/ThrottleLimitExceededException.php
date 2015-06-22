<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ThrottleLimitExceeded
 */
class ThrottleLimitExceededException extends PlatformException {

	public function __construct($message, $code = 31, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
