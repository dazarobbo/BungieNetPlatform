<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * TokenBadFormat
 */
class TokenBadFormatException extends PlatformException {

	public function __construct($message, $code = 2001, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
