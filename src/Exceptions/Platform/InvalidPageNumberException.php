<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * InvalidPageNumber
 */
class InvalidPageNumberException extends PlatformException {

	public function __construct($message, $code = 46, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
