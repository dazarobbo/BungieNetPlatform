<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentPerforceInvalidRevisionError
 */
class ContentPerforceInvalidRevisionErrorException extends PlatformException {

	public function __construct($message, $code = 145, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
