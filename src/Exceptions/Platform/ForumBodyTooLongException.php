<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumBodyTooLong
 */
class ForumBodyTooLongException extends PlatformException {

	public function __construct($message, $code = 536, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
