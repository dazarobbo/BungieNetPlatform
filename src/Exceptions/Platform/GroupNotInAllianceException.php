<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupNotInAlliance
 */
class GroupNotInAllianceException extends PlatformException {

	public function __construct($message, $code = 663, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
