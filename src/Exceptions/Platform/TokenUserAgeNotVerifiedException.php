<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * TokenUserAgeNotVerified
 */
class TokenUserAgeNotVerifiedException extends PlatformException {

	public function __construct($message, $code = 2013, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
