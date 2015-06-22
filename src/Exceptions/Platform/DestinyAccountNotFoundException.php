<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyAccountNotFound
 */
class DestinyAccountNotFoundException extends PlatformException {

	public function __construct($message, $code = 1601, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
