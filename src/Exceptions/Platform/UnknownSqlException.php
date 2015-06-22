<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * UnknownSqlException
 */
class UnknownSqlException extends PlatformException {

	public function __construct($message, $code = 44, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
