<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * IgnoreErrorRetrievingGroupPermissions
 */
class IgnoreErrorRetrievingGroupPermissionsException extends PlatformException {

	public function __construct($message, $code = 1002, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
