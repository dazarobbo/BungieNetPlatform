<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentValidationError
 */
class ContentValidationErrorException extends PlatformException {

	public function __construct($message, $code = 119, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
