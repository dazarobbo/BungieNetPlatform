<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * InvalidPostBody
 */
class InvalidPostBodyException extends PlatformException {

	public function __construct($message, $code = 25, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
