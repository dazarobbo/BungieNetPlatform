<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * InvitationTooManyRecipients
 */
class InvitationTooManyRecipientsException extends PlatformException {

	public function __construct($message, $code = 1912, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
