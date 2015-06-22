<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentPropertyInvalidNumber
 */
class ContentPropertyInvalidNumberException extends PlatformException {

	public function __construct($message, $code = 147, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
