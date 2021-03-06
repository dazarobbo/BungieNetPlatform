<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * TokenUserAlreadyOwnsOffer
 */
class TokenUserAlreadyOwnsOfferException extends PlatformException {

	public function __construct($message, $code = 2007, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
