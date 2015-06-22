<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentPhysicalFileCreationError
 */
class ContentPhysicalFileCreationErrorException extends PlatformException {

	public function __construct($message, $code = 108, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
