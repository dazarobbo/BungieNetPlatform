<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyGrimoireStatsDatabaseError
 */
class DestinyGrimoireStatsDatabaseErrorException extends PlatformException {

	public function __construct($message, $code = 1606, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
