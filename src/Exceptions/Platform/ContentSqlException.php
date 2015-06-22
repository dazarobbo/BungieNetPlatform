<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentSqlException
 */
class ContentSqlException extends PlatformException {

	public function __construct($message, $code = 102, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
