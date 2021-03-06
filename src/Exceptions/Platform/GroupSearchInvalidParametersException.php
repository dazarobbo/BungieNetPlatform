<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupSearchInvalidParameters
 */
class GroupSearchInvalidParametersException extends PlatformException {

	public function __construct($message, $code = 605, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
