<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyUnexpectedError
 */
class DestinyUnexpectedErrorException extends PlatformException {

	public function __construct($message, $code = 1618, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
