<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupNotFound
 */
class GroupNotFoundException extends PlatformException {

	public function __construct($message, $code = 622, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
