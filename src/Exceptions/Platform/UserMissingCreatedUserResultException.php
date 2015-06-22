<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * UserMissingCreatedUserResult
 */
class UserMissingCreatedUserResultException extends PlatformException {

	public function __construct($message, $code = 219, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
