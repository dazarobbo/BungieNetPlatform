<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * PsnApiBadRequest
 */
class PsnApiBadRequestException extends PlatformException {

	public function __construct($message, $code = 1225, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
