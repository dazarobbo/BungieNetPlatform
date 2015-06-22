<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * TransportException
 */
class TransportException extends PlatformException {

	public function __construct($message, $code = 2, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
