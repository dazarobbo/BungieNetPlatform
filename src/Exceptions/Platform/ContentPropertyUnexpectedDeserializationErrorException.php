<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentPropertyUnexpectedDeserializationError
 */
class ContentPropertyUnexpectedDeserializationErrorException extends PlatformException {

	public function __construct($message, $code = 154, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
