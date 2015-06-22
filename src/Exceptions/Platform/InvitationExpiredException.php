<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * InvitationExpired
 */
class InvitationExpiredException extends PlatformException {

	public function __construct($message, $code = 1900, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
