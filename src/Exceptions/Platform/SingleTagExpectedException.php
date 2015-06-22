<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * SingleTagExpected
 */
class SingleTagExpectedException extends PlatformException {

	public function __construct($message, $code = 908, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
