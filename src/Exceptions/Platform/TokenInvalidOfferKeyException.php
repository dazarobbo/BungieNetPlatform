<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * TokenInvalidOfferKey
 */
class TokenInvalidOfferKeyException extends PlatformException {

	public function __construct($message, $code = 2008, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
