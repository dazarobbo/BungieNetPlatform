<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * PSNExExpiredTicket
 */
class PSNExExpiredTicketException extends PlatformException {

	public function __construct($message, $code = 1204, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
