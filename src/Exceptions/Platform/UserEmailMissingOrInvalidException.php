<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * UserEmailMissingOrInvalid
 */
class UserEmailMissingOrInvalidException extends PlatformException {

	public function __construct($message, $code = 214, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
