<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ExternalServiceUnknown
 */
class ExternalServiceUnknownException extends PlatformException {

	public function __construct($message, $code = 38, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
