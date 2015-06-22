<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupMemberBanned
 */
class GroupMemberBannedException extends PlatformException {

	public function __construct($message, $code = 623, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
