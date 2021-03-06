<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * NotAValidPartialTag
 */
class NotAValidPartialTagException extends PlatformException {

	public function __construct($message, $code = 903, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
