<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ActivityLoggingDisabled
 */
class ActivityLoggingDisabledException extends PlatformException {

	public function __construct($message, $code = 707, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
