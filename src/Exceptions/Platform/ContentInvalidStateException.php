<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentInvalidState
 */
class ContentInvalidStateException extends PlatformException {

	public function __construct($message, $code = 115, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
