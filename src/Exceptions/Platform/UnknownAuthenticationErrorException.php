<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * UnknownAuthenticationError
 */
class UnknownAuthenticationErrorException extends PlatformException {

	public function __construct($message, $code = 97, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
