<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupAlreadyAllied
 */
class GroupAlreadyAlliedException extends PlatformException {

	public function __construct($message, $code = 641, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
