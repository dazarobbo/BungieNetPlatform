<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupToGroupNotFollowing
 */
class GroupToGroupNotFollowingException extends PlatformException {

	public function __construct($message, $code = 666, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
