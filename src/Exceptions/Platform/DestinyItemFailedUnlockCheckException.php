<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyItemFailedUnlockCheck
 */
class DestinyItemFailedUnlockCheckException extends PlatformException {

	public function __construct($message, $code = 1639, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
