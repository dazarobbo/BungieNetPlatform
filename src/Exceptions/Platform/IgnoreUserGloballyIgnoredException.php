<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * IgnoreUserGloballyIgnored
 */
class IgnoreUserGloballyIgnoredException extends PlatformException {

	public function __construct($message, $code = 1008, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
