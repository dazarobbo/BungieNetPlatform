<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * TokenPurchaseClaimFailedAfterTokenClaimed
 */
class TokenPurchaseClaimFailedAfterTokenClaimedException extends PlatformException {

	public function __construct($message, $code = 2006, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
