<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * TagInvalid
 */
class TagInvalidException extends PlatformException {

	public function __construct($message, $code = 906, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
