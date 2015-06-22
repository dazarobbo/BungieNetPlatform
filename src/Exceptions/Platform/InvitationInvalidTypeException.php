<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * InvitationInvalidType
 */
class InvitationInvalidTypeException extends PlatformException {

	public function __construct($message, $code = 1903, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
