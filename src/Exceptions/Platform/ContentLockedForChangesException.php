<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentLockedForChanges
 */
class ContentLockedForChangesException extends PlatformException {

	public function __construct($message, $code = 135, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
