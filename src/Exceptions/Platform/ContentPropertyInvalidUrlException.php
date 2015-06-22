<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentPropertyInvalidUrl
 */
class ContentPropertyInvalidUrlException extends PlatformException {

	public function __construct($message, $code = 148, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
