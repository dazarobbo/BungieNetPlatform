<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * UnhandledException
 */
class UnhandledException extends PlatformException {

	public function __construct($message, $code = 3, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
