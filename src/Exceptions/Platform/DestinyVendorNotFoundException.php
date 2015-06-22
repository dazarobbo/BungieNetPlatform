<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyVendorNotFound
 */
class DestinyVendorNotFoundException extends PlatformException {

	public function __construct($message, $code = 1627, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
