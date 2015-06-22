<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ClanAlreadyEnabledForPlatform
 */
class ClanAlreadyEnabledForPlatformException extends PlatformException {

	public function __construct($message, $code = 653, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
