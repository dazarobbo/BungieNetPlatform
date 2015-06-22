<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * FbAccessDenied
 */
class FbAccessDeniedException extends PlatformException {

	public function __construct($message, $code = 1802, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
