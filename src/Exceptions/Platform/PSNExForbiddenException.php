<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * PSNExForbidden
 */
class PSNExForbiddenException extends PlatformException {

	public function __construct($message, $code = 1205, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
