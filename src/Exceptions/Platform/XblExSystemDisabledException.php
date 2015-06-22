<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * XblExSystemDisabled
 */
class XblExSystemDisabledException extends PlatformException {

	public function __construct($message, $code = 1300, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
