<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * IgnoreErrorInsufficientPermission
 */
class IgnoreErrorInsufficientPermissionException extends PlatformException {

	public function __construct($message, $code = 1003, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
