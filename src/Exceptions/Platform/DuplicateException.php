<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * Duplicate
 */
class DuplicateException extends PlatformException {

	public function __construct($message, $code = 13, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
