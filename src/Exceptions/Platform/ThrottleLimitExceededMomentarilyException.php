<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ThrottleLimitExceededMomentarily
 */
class ThrottleLimitExceededMomentarilyException extends PlatformException {

	public function __construct($message, $code = 36, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
