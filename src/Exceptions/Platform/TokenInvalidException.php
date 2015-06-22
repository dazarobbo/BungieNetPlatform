<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * TokenInvalid
 */
class TokenInvalidException extends PlatformException {

	public function __construct($message, $code = 2000, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
