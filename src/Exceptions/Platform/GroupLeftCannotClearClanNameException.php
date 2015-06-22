<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupLeftCannotClearClanName
 */
class GroupLeftCannotClearClanNameException extends PlatformException {

	public function __construct($message, $code = 634, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
