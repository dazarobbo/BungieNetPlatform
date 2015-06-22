<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * InvitationGroupCannotSendToSelf
 */
class InvitationGroupCannotSendToSelfException extends PlatformException {

	public function __construct($message, $code = 1911, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
