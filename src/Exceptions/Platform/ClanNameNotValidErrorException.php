<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ClanNameNotValidError
 */
class ClanNameNotValidErrorException extends PlatformException {

	public function __construct($message, $code = 669, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
