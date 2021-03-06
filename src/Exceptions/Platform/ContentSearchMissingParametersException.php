<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentSearchMissingParameters
 */
class ContentSearchMissingParametersException extends PlatformException {

	public function __construct($message, $code = 105, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
