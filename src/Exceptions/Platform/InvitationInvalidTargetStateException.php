<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * InvitationInvalidTargetState
 */
class InvitationInvalidTargetStateException extends PlatformException {

	public function __construct($message, $code = 1907, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
