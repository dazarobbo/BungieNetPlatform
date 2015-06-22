<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ClanEnabledButCouldNotJoinNoAccount
 */
class ClanEnabledButCouldNotJoinNoAccountException extends PlatformException {

	public function __construct($message, $code = 655, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
