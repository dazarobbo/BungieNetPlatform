<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupJoinedCannotSetClanName
 */
class GroupJoinedCannotSetClanNameException extends PlatformException {

	public function __construct($message, $code = 633, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
