<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyInvalidFlag
 */
class DestinyInvalidFlagException extends PlatformException {

	public function __construct($message, $code = 1621, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
