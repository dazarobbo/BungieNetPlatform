<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentPerforceChangelistResultNotFound
 */
class ContentPerforceChangelistResultNotFoundException extends PlatformException {

	public function __construct($message, $code = 143, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
