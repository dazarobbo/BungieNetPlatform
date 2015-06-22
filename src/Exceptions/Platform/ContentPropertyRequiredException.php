<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentPropertyRequired
 */
class ContentPropertyRequiredException extends PlatformException {

	public function __construct($message, $code = 155, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
