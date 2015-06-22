<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * InvitationNotFound
 */
class InvitationNotFoundException extends PlatformException {

	public function __construct($message, $code = 1914, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
