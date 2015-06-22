<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumUnexpectedError
 */
class ForumUnexpectedErrorException extends PlatformException {

	public function __construct($message, $code = 577, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
