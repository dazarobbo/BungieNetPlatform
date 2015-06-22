<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * InvitationCannotBeReactivated
 */
class InvitationCannotBeReactivatedException extends PlatformException {

	public function __construct($message, $code = 1908, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
