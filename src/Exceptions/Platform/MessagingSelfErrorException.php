<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * MessagingSelfError
 */
class MessagingSelfErrorException extends PlatformException {

	public function __construct($message, $code = 301, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
