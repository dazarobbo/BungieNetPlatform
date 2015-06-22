<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * InvitationInsufficientPermission
 */
class InvitationInsufficientPermissionException extends PlatformException {

	public function __construct($message, $code = 1905, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
