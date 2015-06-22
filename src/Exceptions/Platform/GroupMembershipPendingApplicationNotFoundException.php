<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupMembershipPendingApplicationNotFound
 */
class GroupMembershipPendingApplicationNotFoundException extends PlatformException {

	public function __construct($message, $code = 606, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
