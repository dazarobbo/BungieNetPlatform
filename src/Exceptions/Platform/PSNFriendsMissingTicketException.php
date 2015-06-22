<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * PSNFriendsMissingTicket
 */
class PSNFriendsMissingTicketException extends PlatformException {

	public function __construct($message, $code = 1219, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
