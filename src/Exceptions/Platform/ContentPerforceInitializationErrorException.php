<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentPerforceInitializationError
 */
class ContentPerforceInitializationErrorException extends PlatformException {

	public function __construct($message, $code = 110, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
