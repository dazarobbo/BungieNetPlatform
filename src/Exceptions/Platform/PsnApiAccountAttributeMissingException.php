<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * PsnApiAccountAttributeMissing
 */
class PsnApiAccountAttributeMissingException extends PlatformException {

	public function __construct($message, $code = 1237, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
