<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentLocalePermissionDenied
 */
class ContentLocalePermissionDeniedException extends PlatformException {

	public function __construct($message, $code = 166, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
