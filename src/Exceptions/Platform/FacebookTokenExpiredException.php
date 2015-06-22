<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * FacebookTokenExpired
 */
class FacebookTokenExpiredException extends PlatformException {

	public function __construct($message, $code = 94, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
