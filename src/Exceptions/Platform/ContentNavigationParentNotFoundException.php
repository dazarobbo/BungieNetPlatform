<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentNavigationParentNotFound
 */
class ContentNavigationParentNotFoundException extends PlatformException {

	public function __construct($message, $code = 116, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
