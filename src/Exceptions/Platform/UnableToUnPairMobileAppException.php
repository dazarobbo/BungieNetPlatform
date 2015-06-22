<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * UnableToUnPairMobileApp
 */
class UnableToUnPairMobileAppException extends PlatformException {

	public function __construct($message, $code = 90, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
