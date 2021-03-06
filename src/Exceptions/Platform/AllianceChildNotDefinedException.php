<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * AllianceChildNotDefined
 */
class AllianceChildNotDefinedException extends PlatformException {

	public function __construct($message, $code = 671, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
