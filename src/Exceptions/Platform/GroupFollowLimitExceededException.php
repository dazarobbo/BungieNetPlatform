<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupFollowLimitExceeded
 */
class GroupFollowLimitExceededException extends PlatformException {

	public function __construct($message, $code = 804, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
