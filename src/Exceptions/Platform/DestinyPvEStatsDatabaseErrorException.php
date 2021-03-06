<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyPvEStatsDatabaseError
 */
class DestinyPvEStatsDatabaseErrorException extends PlatformException {

	public function __construct($message, $code = 1605, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
