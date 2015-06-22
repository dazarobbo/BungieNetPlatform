<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * UserMissingMobilePairingInfo
 */
class UserMissingMobilePairingInfoException extends PlatformException {

	public function __construct($message, $code = 208, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
