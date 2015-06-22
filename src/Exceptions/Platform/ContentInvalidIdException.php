<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentInvalidId
 */
class ContentInvalidIdException extends PlatformException {

	public function __construct($message, $code = 106, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
