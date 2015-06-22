<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentProjectNotFound
 */
class ContentProjectNotFoundException extends PlatformException {

	public function __construct($message, $code = 129, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
