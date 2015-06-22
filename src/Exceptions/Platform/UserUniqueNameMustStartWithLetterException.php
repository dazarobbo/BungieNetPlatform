<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * UserUniqueNameMustStartWithLetter
 */
class UserUniqueNameMustStartWithLetterException extends PlatformException {

	public function __construct($message, $code = 223, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
