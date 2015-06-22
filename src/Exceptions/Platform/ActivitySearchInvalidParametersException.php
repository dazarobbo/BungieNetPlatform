<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ActivitySearchInvalidParameters
 */
class ActivitySearchInvalidParametersException extends PlatformException {

	public function __construct($message, $code = 704, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
