<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyInvalidMembershipType
 */
class DestinyInvalidMembershipTypeException extends PlatformException {

	public function __construct($message, $code = 1630, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
