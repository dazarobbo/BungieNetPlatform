<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumUnknownTagCreationError
 */
class ForumUnknownTagCreationErrorException extends PlatformException {

	public function __construct($message, $code = 505, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
