<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * TokenMarketplaceInvalidPlatform
 */
class TokenMarketplaceInvalidPlatformException extends PlatformException {

	public function __construct($message, $code = 2016, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
