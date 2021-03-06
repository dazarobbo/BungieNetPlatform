<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ServiceUnsupported
 */
class ServiceUnsupportedException extends PlatformException {

	public function __construct($message, $code = 48, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
