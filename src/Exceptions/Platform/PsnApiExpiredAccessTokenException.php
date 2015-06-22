<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * PsnApiExpiredAccessToken
 */
class PsnApiExpiredAccessTokenException extends PlatformException {

	public function __construct($message, $code = 1228, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
