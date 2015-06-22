<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * PsnApiServerBusy
 */
class PsnApiServerBusyException extends PlatformException {

	public function __construct($message, $code = 1232, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
