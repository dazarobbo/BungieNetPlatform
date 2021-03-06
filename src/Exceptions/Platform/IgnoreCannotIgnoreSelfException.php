<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * IgnoreCannotIgnoreSelf
 */
class IgnoreCannotIgnoreSelfException extends PlatformException {

	public function __construct($message, $code = 1005, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
