<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * NotFound
 */
class NotFoundException extends PlatformException {

	public function __construct($message, $code = 21, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
