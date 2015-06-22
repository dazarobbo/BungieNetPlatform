<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * UserAcknowledgmentTableFull
 */
class UserAcknowledgmentTableFullException extends PlatformException {

	public function __construct($message, $code = 225, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
