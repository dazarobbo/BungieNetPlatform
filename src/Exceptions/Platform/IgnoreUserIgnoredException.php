<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * IgnoreUserIgnored
 */
class IgnoreUserIgnoredException extends PlatformException {

	public function __construct($message, $code = 1009, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
