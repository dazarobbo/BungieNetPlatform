<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupInvalidId
 */
class GroupInvalidIdException extends PlatformException {

	public function __construct($message, $code = 607, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
