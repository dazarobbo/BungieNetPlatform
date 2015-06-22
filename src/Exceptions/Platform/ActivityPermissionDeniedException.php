<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ActivityPermissionDenied
 */
class ActivityPermissionDeniedException extends PlatformException {

	public function __construct($message, $code = 705, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
