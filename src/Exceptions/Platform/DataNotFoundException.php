<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DataNotFound
 */
class DataNotFoundException extends PlatformException {

	public function __construct($message, $code = 11, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
