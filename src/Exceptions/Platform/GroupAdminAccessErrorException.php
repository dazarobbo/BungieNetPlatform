<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupAdminAccessError
 */
class GroupAdminAccessErrorException extends PlatformException {

	public function __construct($message, $code = 616, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
