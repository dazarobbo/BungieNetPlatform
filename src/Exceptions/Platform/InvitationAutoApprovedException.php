<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * InvitationAutoApproved
 */
class InvitationAutoApprovedException extends PlatformException {

	public function __construct($message, $code = 1909, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
