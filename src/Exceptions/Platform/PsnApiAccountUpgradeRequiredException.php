<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * PsnApiAccountUpgradeRequired
 */
class PsnApiAccountUpgradeRequiredException extends PlatformException {

	public function __construct($message, $code = 1230, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
