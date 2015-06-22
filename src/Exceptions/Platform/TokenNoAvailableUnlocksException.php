<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * TokenNoAvailableUnlocks
 */
class TokenNoAvailableUnlocksException extends PlatformException {

	public function __construct($message, $code = 2015, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
