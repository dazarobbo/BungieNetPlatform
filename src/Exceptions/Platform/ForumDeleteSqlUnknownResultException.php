<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumDeleteSqlUnknownResult
 */
class ForumDeleteSqlUnknownResultException extends PlatformException {

	public function __construct($message, $code = 559, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
