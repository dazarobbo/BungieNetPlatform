<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * OwnerGroupAlreadyInAlliance
 */
class OwnerGroupAlreadyInAllianceException extends PlatformException {

	public function __construct($message, $code = 661, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
