<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentUnknownSqlResult
 */
class ContentUnknownSqlResultException extends PlatformException {

	public function __construct($message, $code = 100, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
