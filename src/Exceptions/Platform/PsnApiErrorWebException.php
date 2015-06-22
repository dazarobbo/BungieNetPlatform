<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * PsnApiErrorWebException
 */
class PsnApiErrorWebException extends PlatformException {

	public function __construct($message, $code = 1224, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
