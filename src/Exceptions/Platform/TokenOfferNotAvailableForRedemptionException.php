<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * TokenOfferNotAvailableForRedemption
 */
class TokenOfferNotAvailableForRedemptionException extends PlatformException {

	public function __construct($message, $code = 2018, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
