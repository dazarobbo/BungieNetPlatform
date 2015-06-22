<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyItemFailedLevelCheck
 */
class DestinyItemFailedLevelCheckException extends PlatformException {

	public function __construct($message, $code = 1638, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
