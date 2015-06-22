<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * FbUnsupportedGrantType
 */
class FbUnsupportedGrantTypeException extends PlatformException {

	public function __construct($message, $code = 1805, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
