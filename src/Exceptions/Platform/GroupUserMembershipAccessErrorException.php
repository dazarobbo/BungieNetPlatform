<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupUserMembershipAccessError
 */
class GroupUserMembershipAccessErrorException extends PlatformException {

	public function __construct($message, $code = 614, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
