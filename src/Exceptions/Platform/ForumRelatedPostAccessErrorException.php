<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumRelatedPostAccessError
 */
class ForumRelatedPostAccessErrorException extends PlatformException {

	public function __construct($message, $code = 521, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
