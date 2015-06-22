<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ChildGroupAlreadyInAlliance
 */
class ChildGroupAlreadyInAllianceException extends PlatformException {

	public function __construct($message, $code = 660, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
