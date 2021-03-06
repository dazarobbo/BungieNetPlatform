<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumCannotShareOwnPost
 */
class ForumCannotShareOwnPostException extends PlatformException {

	public function __construct($message, $code = 539, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
