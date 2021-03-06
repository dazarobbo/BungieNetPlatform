<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumUnknownSqlResultDuringTagItem
 */
class ForumUnknownSqlResultDuringTagItemException extends PlatformException {

	public function __construct($message, $code = 506, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
