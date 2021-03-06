<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ServiceRetired
 */
class ServiceRetiredException extends PlatformException {

	public function __construct($message, $code = 43, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
