<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyRecentActivitiesDatabaseError
 */
class DestinyRecentActivitiesDatabaseErrorException extends PlatformException {

	public function __construct($message, $code = 1628, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
