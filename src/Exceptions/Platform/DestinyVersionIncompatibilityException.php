<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyVersionIncompatibility
 */
class DestinyVersionIncompatibilityException extends PlatformException {

	public function __construct($message, $code = 1631, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
