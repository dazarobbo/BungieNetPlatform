<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ActivitiesParameterNull
 */
class ActivitiesParameterNullException extends PlatformException {

	public function __construct($message, $code = 702, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
