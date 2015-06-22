<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * UserCannotLoadAccountCredentialLinkInfo
 */
class UserCannotLoadAccountCredentialLinkInfoException extends PlatformException {

	public function __construct($message, $code = 206, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
