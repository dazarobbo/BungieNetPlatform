<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyNoRoomInDestination
 */
class DestinyNoRoomInDestinationException extends PlatformException {

	public function __construct($message, $code = 1642, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
