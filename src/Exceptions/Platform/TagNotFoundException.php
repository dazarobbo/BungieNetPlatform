<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * TagNotFound
 */
class TagNotFoundException extends PlatformException {

	public function __construct($message, $code = 907, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
