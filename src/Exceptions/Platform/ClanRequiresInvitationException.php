<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ClanRequiresInvitation
 */
class ClanRequiresInvitationException extends PlatformException {

	public function __construct($message, $code = 674, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
