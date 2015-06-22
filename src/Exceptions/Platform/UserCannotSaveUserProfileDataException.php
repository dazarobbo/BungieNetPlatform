<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * UserCannotSaveUserProfileData
 */
class UserCannotSaveUserProfileDataException extends PlatformException {

	public function __construct($message, $code = 213, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
