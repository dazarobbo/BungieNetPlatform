<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupIdNotReturnedFromCreation
 */
class GroupIdNotReturnedFromCreationException extends PlatformException {

	public function __construct($message, $code = 604, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
