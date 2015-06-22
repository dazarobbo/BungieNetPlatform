<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentNotFound
 */
class ContentNotFoundException extends PlatformException {

	public function __construct($message, $code = 103, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
