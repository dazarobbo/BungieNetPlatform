<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentInvalidBlacklistedContent
 */
class ContentInvalidBlacklistedContentException extends PlatformException {

	public function __construct($message, $code = 168, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
