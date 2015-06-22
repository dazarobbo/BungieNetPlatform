<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * UserGenerateMobileKeyExistingSlotCollision
 */
class UserGenerateMobileKeyExistingSlotCollisionException extends PlatformException {

	public function __construct($message, $code = 210, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
