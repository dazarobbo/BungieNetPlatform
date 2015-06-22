<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * UserCreateUnknownSqlException
 */
class UserCreateUnknownSqlException extends PlatformException {

	public function __construct($message, $code = 203, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
