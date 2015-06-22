<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * AllianceOwnerCannotJoinAlliance
 */
class AllianceOwnerCannotJoinAllianceException extends PlatformException {

	public function __construct($message, $code = 662, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
