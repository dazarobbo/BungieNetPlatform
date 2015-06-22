<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupPrivatePostOverrideError
 */
class GroupPrivatePostOverrideErrorException extends PlatformException {

	public function __construct($message, $code = 625, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
