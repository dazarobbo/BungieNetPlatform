<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * Success
 */
class SuccessException extends PlatformException {

	public function __construct($message, $code = 1, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
