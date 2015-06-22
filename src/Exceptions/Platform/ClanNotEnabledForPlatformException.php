<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ClanNotEnabledForPlatform
 */
class ClanNotEnabledForPlatformException extends PlatformException {

	public function __construct($message, $code = 654, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
