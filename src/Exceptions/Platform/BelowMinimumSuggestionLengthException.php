<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * BelowMinimumSuggestionLength
 */
class BelowMinimumSuggestionLengthException extends PlatformException {

	public function __construct($message, $code = 901, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
