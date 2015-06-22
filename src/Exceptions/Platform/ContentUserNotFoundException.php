<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentUserNotFound
 */
class ContentUserNotFoundException extends PlatformException {

	public function __construct($message, $code = 165, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
