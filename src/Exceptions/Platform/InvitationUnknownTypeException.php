<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * InvitationUnknownType
 */
class InvitationUnknownTypeException extends PlatformException {

	public function __construct($message, $code = 1901, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
