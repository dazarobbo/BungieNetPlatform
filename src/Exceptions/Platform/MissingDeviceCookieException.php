<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * MissingDeviceCookie
 */
class MissingDeviceCookieException extends PlatformException {

	public function __construct($message, $code = 93, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
