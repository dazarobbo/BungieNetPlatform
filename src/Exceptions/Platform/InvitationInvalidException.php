<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * InvitationInvalid
 */
class InvitationInvalidException extends PlatformException {

	public function __construct($message, $code = 1913, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
