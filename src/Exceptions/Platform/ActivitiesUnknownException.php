<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ActivitiesUnknownException
 */
class ActivitiesUnknownException extends PlatformException {

	public function __construct($message, $code = 701, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
