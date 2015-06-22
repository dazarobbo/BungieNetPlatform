<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ClanNameIllegalCharacters
 */
class ClanNameIllegalCharactersException extends PlatformException {

	public function __construct($message, $code = 672, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
