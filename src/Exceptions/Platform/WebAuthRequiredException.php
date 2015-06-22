<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * WebAuthRequired
 */
class WebAuthRequiredException extends PlatformException {

	public function __construct($message, $code = 99, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
