<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * TokenPurchaseHistoryUnknownError
 */
class TokenPurchaseHistoryUnknownErrorException extends PlatformException {

	public function __construct($message, $code = 2011, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
