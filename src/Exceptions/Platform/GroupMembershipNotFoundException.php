<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupMembershipNotFound
 */
class GroupMembershipNotFoundException extends PlatformException {

	public function __construct($message, $code = 611, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
