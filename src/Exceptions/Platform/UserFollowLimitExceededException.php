<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * UserFollowLimitExceeded
 */
class UserFollowLimitExceededException extends PlatformException {

	public function __construct($message, $code = 806, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
