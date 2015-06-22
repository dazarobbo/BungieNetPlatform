<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupMemberInvalidSort
 */
class GroupMemberInvalidSortException extends PlatformException {

	public function __construct($message, $code = 651, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
