<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * UserNonUniqueName
 */
class UserNonUniqueNameException extends PlatformException {

	public function __construct($message, $code = 200, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
