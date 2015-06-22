<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentNavigationParentUpdateError
 */
class ContentNavigationParentUpdateErrorException extends PlatformException {

	public function __construct($message, $code = 117, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
