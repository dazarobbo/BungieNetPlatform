<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * UserInvalidMobileAppType
 */
class UserInvalidMobileAppTypeException extends PlatformException {

	public function __construct($message, $code = 207, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
