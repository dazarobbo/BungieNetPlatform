<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * PsnApiProfileUserNotFound
 */
class PsnApiProfileUserNotFoundException extends PlatformException {

	public function __construct($message, $code = 1234, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
