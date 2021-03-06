<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * FbRedirectMismatch
 */
class FbRedirectMismatchException extends PlatformException {

	public function __construct($message, $code = 1801, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
