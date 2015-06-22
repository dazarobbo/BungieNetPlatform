<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * TokenUnlockPartialFailure
 */
class TokenUnlockPartialFailureException extends PlatformException {

	public function __construct($message, $code = 2019, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
