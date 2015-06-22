<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * UnknownSqlResult
 */
class UnknownSqlResultException extends PlatformException {

	public function __construct($message, $code = 14, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
