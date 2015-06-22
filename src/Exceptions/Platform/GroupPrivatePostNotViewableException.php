<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupPrivatePostNotViewable
 */
class GroupPrivatePostNotViewableException extends PlatformException {

	public function __construct($message, $code = 617, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
