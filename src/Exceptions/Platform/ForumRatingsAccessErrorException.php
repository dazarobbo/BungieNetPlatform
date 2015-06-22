<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumRatingsAccessError
 */
class ForumRatingsAccessErrorException extends PlatformException {

	public function __construct($message, $code = 520, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
