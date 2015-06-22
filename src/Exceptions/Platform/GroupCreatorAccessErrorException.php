<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupCreatorAccessError
 */
class GroupCreatorAccessErrorException extends PlatformException {

	public function __construct($message, $code = 615, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
