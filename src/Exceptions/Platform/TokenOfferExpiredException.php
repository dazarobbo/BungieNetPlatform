<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * TokenOfferExpired
 */
class TokenOfferExpiredException extends PlatformException {

	public function __construct($message, $code = 2021, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
