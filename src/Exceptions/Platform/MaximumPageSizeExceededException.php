<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * MaximumPageSizeExceeded
 */
class MaximumPageSizeExceededException extends PlatformException {

	public function __construct($message, $code = 47, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
