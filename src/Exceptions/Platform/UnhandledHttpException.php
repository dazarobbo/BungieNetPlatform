<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * UnhandledHttpException
 */
class UnhandledHttpException extends PlatformException {

	public function __construct($message, $code = 20, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
