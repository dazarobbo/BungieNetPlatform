<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupAlreadyMember
 */
class GroupAlreadyMemberException extends PlatformException {

	public function __construct($message, $code = 642, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
