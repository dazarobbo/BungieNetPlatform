<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupCannotCheckBanStatus
 */
class GroupCannotCheckBanStatusException extends PlatformException {

	public function __construct($message, $code = 628, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
