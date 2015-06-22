<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * CannotFollowSelf
 */
class CannotFollowSelfException extends PlatformException {

	public function __construct($message, $code = 803, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
