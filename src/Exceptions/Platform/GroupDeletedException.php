<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupDeleted
 */
class GroupDeletedException extends PlatformException {

	public function __construct($message, $code = 621, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
