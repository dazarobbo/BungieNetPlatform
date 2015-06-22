<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * TokenNoMarketplaceCodesFound
 */
class TokenNoMarketplaceCodesFoundException extends PlatformException {

	public function __construct($message, $code = 2017, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
