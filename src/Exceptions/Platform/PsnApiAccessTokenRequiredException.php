<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * PsnApiAccessTokenRequired
 */
class PsnApiAccessTokenRequiredException extends PlatformException {

	public function __construct($message, $code = 1226, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
