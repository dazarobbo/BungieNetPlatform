<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * TokenExceededOfferMaximum
 */
class TokenExceededOfferMaximumException extends PlatformException {

	public function __construct($message, $code = 2014, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
