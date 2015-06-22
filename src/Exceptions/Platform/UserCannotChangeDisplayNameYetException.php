<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * UserCannotChangeDisplayNameYet
 */
class UserCannotChangeDisplayNameYetException extends PlatformException {

	public function __construct($message, $code = 221, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
