<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentPackagesInvalidState
 */
class ContentPackagesInvalidStateException extends PlatformException {

	public function __construct($message, $code = 132, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
