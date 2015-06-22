<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * UserCannotGenerateMobileKeyWhileUsingMobileCredential
 */
class UserCannotGenerateMobileKeyWhileUsingMobileCredentialException extends PlatformException {

	public function __construct($message, $code = 0, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
