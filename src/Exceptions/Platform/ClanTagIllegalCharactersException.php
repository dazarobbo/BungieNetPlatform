<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ClanTagIllegalCharacters
 */
class ClanTagIllegalCharactersException extends PlatformException {

	public function __construct($message, $code = 673, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
