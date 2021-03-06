<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumUserStatusAccessError
 */
class ForumUserStatusAccessErrorException extends PlatformException {

	public function __construct($message, $code = 523, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
