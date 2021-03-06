<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupInvalidPlatformType
 */
class GroupInvalidPlatformTypeException extends PlatformException {

	public function __construct($message, $code = 650, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
