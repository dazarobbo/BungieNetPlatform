<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentPropertiesValidationError
 */
class ContentPropertiesValidationErrorException extends PlatformException {

	public function __construct($message, $code = 120, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
