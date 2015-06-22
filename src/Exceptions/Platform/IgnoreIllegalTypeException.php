<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * IgnoreIllegalType
 */
class IgnoreIllegalTypeException extends PlatformException {

	public function __construct($message, $code = 1006, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
