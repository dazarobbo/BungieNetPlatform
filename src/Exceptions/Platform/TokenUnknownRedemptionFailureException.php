<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * TokenUnknownRedemptionFailure
 */
class TokenUnknownRedemptionFailureException extends PlatformException {

	public function __construct($message, $code = 2005, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
