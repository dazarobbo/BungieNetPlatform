<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentPerforceFileHistoryNotFound
 */
class ContentPerforceFileHistoryNotFoundException extends PlatformException {

	public function __construct($message, $code = 126, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
