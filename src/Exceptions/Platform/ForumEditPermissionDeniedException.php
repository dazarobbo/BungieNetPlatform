<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumEditPermissionDenied
 */
class ForumEditPermissionDeniedException extends PlatformException {

	public function __construct($message, $code = 516, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
