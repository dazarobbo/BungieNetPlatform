<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentTagSaveFailure
 */
class ContentTagSaveFailureException extends PlatformException {

	public function __construct($message, $code = 141, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
