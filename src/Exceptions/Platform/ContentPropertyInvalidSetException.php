<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentPropertyInvalidSet
 */
class ContentPropertyInvalidSetException extends PlatformException {

	public function __construct($message, $code = 150, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
