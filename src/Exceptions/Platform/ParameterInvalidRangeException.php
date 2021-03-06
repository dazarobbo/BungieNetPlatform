<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ParameterInvalidRange
 */
class ParameterInvalidRangeException extends PlatformException {

	public function __construct($message, $code = 8, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
