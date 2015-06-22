<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * MessagingSendThrottle
 */
class MessagingSendThrottleException extends PlatformException {

	public function __construct($message, $code = 302, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
