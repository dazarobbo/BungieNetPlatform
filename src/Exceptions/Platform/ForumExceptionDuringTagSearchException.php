<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumExceptionDuringTagSearch
 */
class ForumExceptionDuringTagSearchException extends PlatformException {

	public function __construct($message, $code = 509, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
