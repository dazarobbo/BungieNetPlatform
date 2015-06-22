<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ClanCannotSetTwoDefaultPostTypes
 */
class ClanCannotSetTwoDefaultPostTypesException extends PlatformException {

	public function __construct($message, $code = 648, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
