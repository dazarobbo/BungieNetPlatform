<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * SystemDisabled
 */
class SystemDisabledException extends PlatformException {

	public function __construct($message, $code = 5, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
