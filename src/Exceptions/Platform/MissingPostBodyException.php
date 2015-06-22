<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * MissingPostBody
 */
class MissingPostBodyException extends PlatformException {

	public function __construct($message, $code = 26, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
