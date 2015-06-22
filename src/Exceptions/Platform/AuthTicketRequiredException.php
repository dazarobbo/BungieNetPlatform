<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * AuthTicketRequired
 */
class AuthTicketRequiredException extends PlatformException {

	public function __construct($message, $code = 95, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
