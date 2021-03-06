<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyInvalidAction
 */
class DestinyInvalidActionException extends PlatformException {

	public function __construct($message, $code = 1619, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
