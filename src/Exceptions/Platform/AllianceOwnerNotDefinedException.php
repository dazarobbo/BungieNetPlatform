<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * AllianceOwnerNotDefined
 */
class AllianceOwnerNotDefinedException extends PlatformException {

	public function __construct($message, $code = 670, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
