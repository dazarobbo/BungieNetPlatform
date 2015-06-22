<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * BadRequest
 */
class BadRequestException extends PlatformException {

	public function __construct($message, $code = 9, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
