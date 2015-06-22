<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * FollowUnsupportedEntityType
 */
class FollowUnsupportedEntityTypeException extends PlatformException {

	public function __construct($message, $code = 807, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
