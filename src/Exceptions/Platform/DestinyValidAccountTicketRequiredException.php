<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyValidAccountTicketRequired
 */
class DestinyValidAccountTicketRequiredException extends PlatformException {

	public function __construct($message, $code = 1650, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
