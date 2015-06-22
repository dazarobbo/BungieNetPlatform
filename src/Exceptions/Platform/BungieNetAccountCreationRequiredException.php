<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * BungieNetAccountCreationRequired
 */
class BungieNetAccountCreationRequiredException extends PlatformException {

	public function __construct($message, $code = 98, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
