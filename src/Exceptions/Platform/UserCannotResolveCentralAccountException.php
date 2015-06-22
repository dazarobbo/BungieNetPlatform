<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * UserCannotResolveCentralAccount
 */
class UserCannotResolveCentralAccountException extends PlatformException {

	public function __construct($message, $code = 217, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
