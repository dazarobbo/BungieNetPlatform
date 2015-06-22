<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyInvalidRequest
 */
class DestinyInvalidRequestException extends PlatformException {

	public function __construct($message, $code = 1622, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
