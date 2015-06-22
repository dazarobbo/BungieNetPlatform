<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * AlreadyRequestingMembershipForClanPlatform
 */
class AlreadyRequestingMembershipForClanPlatformException extends PlatformException {

	public function __construct($message, $code = 631, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
