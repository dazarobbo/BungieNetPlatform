<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * UserCreateUnknownSqlResult
 */
class UserCreateUnknownSqlResultException extends PlatformException {

	public function __construct($message, $code = 202, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
