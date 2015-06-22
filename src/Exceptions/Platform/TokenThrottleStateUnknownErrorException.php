<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * TokenThrottleStateUnknownError
 */
class TokenThrottleStateUnknownErrorException extends PlatformException {

	public function __construct($message, $code = 2012, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
