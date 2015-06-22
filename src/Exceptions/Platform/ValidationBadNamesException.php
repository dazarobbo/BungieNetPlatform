<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ValidationBadNames
 */
class ValidationBadNamesException extends PlatformException {

	public function __construct($message, $code = 41, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
