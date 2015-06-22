<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * NoClanMembershipForPlatform
 */
class NoClanMembershipForPlatformException extends PlatformException {

	public function __construct($message, $code = 658, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
