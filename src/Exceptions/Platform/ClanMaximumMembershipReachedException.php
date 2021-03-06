<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ClanMaximumMembershipReached
 */
class ClanMaximumMembershipReachedException extends PlatformException {

	public function __construct($message, $code = 667, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
