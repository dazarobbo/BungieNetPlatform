<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * UserCannotLoadAccountProfileData
 */
class UserCannotLoadAccountProfileDataException extends PlatformException {

	public function __construct($message, $code = 212, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
