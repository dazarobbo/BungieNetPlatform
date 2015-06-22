<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ChildGroupCannotInviteToAlliance
 */
class ChildGroupCannotInviteToAllianceException extends PlatformException {

	public function __construct($message, $code = 664, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
