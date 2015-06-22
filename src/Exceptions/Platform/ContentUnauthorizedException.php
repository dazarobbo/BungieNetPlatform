<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentUnauthorized
 */
class ContentUnauthorizedException extends PlatformException {

	public function __construct($message, $code = 163, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
