<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * FbInvalidGrant
 */
class FbInvalidGrantException extends PlatformException {

	public function __construct($message, $code = 1806, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
