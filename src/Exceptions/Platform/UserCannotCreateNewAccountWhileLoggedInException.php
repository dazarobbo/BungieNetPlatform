<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * UserCannotCreateNewAccountWhileLoggedIn
 */
class UserCannotCreateNewAccountWhileLoggedInException extends PlatformException {

	public function __construct($message, $code = 216, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
