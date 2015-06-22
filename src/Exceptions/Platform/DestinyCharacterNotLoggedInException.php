<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyCharacterNotLoggedIn
 */
class DestinyCharacterNotLoggedInException extends PlatformException {

	public function __construct($message, $code = 1635, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
