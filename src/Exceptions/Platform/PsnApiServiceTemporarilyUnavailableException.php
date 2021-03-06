<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * PsnApiServiceTemporarilyUnavailable
 */
class PsnApiServiceTemporarilyUnavailableException extends PlatformException {

	public function __construct($message, $code = 1231, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
