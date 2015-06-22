<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupUnknownErrorUndeletingGroup
 */
class GroupUnknownErrorUndeletingGroupException extends PlatformException {

	public function __construct($message, $code = 620, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
