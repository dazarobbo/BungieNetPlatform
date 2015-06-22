<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * UnableToPairMobileApp
 */
class UnableToPairMobileAppException extends PlatformException {

	public function __construct($message, $code = 91, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
