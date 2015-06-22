<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * UserBanned
 */
class UserBannedException extends PlatformException {

	public function __construct($message, $code = 24, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
