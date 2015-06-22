<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * IgnoreNotFound
 */
class IgnoreNotFoundException extends PlatformException {

	public function __construct($message, $code = 1007, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
