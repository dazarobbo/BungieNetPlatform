<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupInvalidMembershipType
 */
class GroupInvalidMembershipTypeException extends PlatformException {

	public function __construct($message, $code = 609, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
