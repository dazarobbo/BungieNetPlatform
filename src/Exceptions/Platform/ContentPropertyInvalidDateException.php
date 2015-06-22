<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentPropertyInvalidDate
 */
class ContentPropertyInvalidDateException extends PlatformException {

	public function __construct($message, $code = 149, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
