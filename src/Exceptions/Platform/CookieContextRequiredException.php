<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * CookieContextRequired
 */
class CookieContextRequiredException extends PlatformException {

	public function __construct($message, $code = 96, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
