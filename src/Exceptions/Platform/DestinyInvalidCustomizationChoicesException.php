<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyInvalidCustomizationChoices
 */
class DestinyInvalidCustomizationChoicesException extends PlatformException {

	public function __construct($message, $code = 1624, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
