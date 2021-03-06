<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * InvitationInvalidCode
 */
class InvitationInvalidCodeException extends PlatformException {

	public function __construct($message, $code = 1906, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
