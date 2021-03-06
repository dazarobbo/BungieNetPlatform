<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyUniquenessViolation
 */
class DestinyUniquenessViolationException extends PlatformException {

	public function __construct($message, $code = 1648, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
