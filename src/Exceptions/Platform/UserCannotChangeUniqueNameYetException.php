<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * UserCannotChangeUniqueNameYet
 */
class UserCannotChangeUniqueNameYetException extends PlatformException {

	public function __construct($message, $code = 220, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
