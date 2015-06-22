<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyVendorItemNotFound
 */
class DestinyVendorItemNotFoundException extends PlatformException {

	public function __construct($message, $code = 1625, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
