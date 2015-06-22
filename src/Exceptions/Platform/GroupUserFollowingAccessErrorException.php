<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupUserFollowingAccessError
 */
class GroupUserFollowingAccessErrorException extends PlatformException {

	public function __construct($message, $code = 613, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
