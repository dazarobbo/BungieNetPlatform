<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupNotDeleted
 */
class GroupNotDeletedException extends PlatformException {

	public function __construct($message, $code = 619, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
