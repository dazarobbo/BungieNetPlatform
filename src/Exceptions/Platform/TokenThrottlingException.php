<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * TokenThrottling
 */
class TokenThrottlingException extends PlatformException {

	public function __construct($message, $code = 2004, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
