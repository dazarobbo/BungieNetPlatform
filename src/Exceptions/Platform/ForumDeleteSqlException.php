<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumDeleteSqlException
 */
class ForumDeleteSqlException extends PlatformException {

	public function __construct($message, $code = 558, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
