<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumGroupAccessError
 */
class ForumGroupAccessErrorException extends PlatformException {

	public function __construct($message, $code = 525, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
