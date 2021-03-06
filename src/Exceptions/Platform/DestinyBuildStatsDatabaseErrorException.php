<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyBuildStatsDatabaseError
 */
class DestinyBuildStatsDatabaseErrorException extends PlatformException {

	public function __construct($message, $code = 1602, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
