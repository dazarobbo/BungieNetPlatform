<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupMemberInvalidMemberType
 */
class GroupMemberInvalidMemberTypeException extends PlatformException {

	public function __construct($message, $code = 649, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
