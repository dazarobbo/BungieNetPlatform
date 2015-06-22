<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * TokenMarketplaceInvalidRegion
 */
class TokenMarketplaceInvalidRegionException extends PlatformException {

	public function __construct($message, $code = 2020, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
