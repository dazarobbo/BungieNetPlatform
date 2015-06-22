<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * UserDisplayNameMissingOrInvalid
 */
class UserDisplayNameMissingOrInvalidException extends PlatformException {

	public function __construct($message, $code = 211, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
