<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * InvalidParameters
 */
class InvalidParametersException extends PlatformException {

	public function __construct($message, $code = 18, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
