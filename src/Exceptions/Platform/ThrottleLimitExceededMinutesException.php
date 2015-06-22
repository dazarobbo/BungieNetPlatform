<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ThrottleLimitExceededMinutes
 */
class ThrottleLimitExceededMinutesException extends PlatformException {

	public function __construct($message, $code = 35, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
