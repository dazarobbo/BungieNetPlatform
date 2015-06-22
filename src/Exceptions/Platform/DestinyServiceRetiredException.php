<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyServiceRetired
 */
class DestinyServiceRetiredException extends PlatformException {

	public function __construct($message, $code = 1644, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
