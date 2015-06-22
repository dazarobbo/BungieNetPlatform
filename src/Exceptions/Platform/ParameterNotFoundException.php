<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ParameterNotFound
 */
class ParameterNotFoundException extends PlatformException {

	public function __construct($message, $code = 19, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
