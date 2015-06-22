<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * IgnoreErrorRetrievingItem
 */
class IgnoreErrorRetrievingItemException extends PlatformException {

	public function __construct($message, $code = 1004, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
