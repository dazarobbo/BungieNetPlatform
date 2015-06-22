<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyContentConfigNotFound
 */
class DestinyContentConfigNotFoundException extends PlatformException {

	public function __construct($message, $code = 1616, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
