<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * JsonDeserializationError
 */
class JsonDeserializationErrorException extends PlatformException {

	public function __construct($message, $code = 30, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
