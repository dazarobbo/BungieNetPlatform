<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumAuthorAccessError
 */
class ForumAuthorAccessErrorException extends PlatformException {

	public function __construct($message, $code = 524, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
