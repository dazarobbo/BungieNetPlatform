<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * WebAuthModuleAsyncFailed
 */
class WebAuthModuleAsyncFailedException extends PlatformException {

	public function __construct($message, $code = 22, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
