<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * CannotUseMobileAuthWithNonMobileProvider
 */
class CannotUseMobileAuthWithNonMobileProviderException extends PlatformException {

	public function __construct($message, $code = 92, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
