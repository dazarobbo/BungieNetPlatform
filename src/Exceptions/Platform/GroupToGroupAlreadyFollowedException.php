<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupToGroupAlreadyFollowed
 */
class GroupToGroupAlreadyFollowedException extends PlatformException {

	public function __construct($message, $code = 665, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
