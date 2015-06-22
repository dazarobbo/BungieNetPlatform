<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * NotImplemented
 */
class NotImplementedException extends PlatformException {

	public function __construct($message, $code = 4, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
