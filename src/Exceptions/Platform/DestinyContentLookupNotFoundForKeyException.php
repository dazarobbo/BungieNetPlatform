<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyContentLookupNotFoundForKey
 */
class DestinyContentLookupNotFoundForKeyException extends PlatformException {

	public function __construct($message, $code = 1612, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
