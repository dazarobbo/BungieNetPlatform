<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentPermissionDenied
 */
class ContentPermissionDeniedException extends PlatformException {

	public function __construct($message, $code = 138, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
