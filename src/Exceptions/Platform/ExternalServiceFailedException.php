<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ExternalServiceFailed
 */
class ExternalServiceFailedException extends PlatformException {

	public function __construct($message, $code = 42, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
