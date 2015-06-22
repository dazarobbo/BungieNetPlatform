<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ValidationMaximumUnicodeCombiningCharacters
 */
class ValidationMaximumUnicodeCombiningCharactersException extends PlatformException {

	public function __construct($message, $code = 49, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
