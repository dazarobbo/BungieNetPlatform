<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentTooManyResults
 */
class ContentTooManyResultsException extends PlatformException {

	public function __construct($message, $code = 113, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
