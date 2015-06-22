<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * FbInvalidScope
 */
class FbInvalidScopeException extends PlatformException {

	public function __construct($message, $code = 1804, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
