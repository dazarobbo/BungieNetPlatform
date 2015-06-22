<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * TagFollowLimitExceeded
 */
class TagFollowLimitExceededException extends PlatformException {

	public function __construct($message, $code = 805, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
