<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * PsnApiInvalidAccessToken
 */
class PsnApiInvalidAccessTokenException extends PlatformException {

	public function __construct($message, $code = 1227, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
