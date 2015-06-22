<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ClanNameNotValid
 */
class ClanNameNotValidException extends PlatformException {

	public function __construct($message, $code = 668, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
