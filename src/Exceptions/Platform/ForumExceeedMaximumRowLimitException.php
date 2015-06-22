<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumExceeedMaximumRowLimit
 */
class ForumExceeedMaximumRowLimitException extends PlatformException {

	public function __construct($message, $code = 542, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
