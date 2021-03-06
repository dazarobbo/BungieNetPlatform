<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * FbUnsupportedResponseType
 */
class FbUnsupportedResponseTypeException extends PlatformException {

	public function __construct($message, $code = 1803, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
