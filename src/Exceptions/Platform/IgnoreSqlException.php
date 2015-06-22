<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * IgnoreSqlException
 */
class IgnoreSqlException extends PlatformException {

	public function __construct($message, $code = 1001, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
