<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupToGroupFollowLimitReached
 */
class GroupToGroupFollowLimitReachedException extends PlatformException {

	public function __construct($message, $code = 659, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
