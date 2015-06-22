<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumCannotLocatePost
 */
class ForumCannotLocatePostException extends PlatformException {

	public function __construct($message, $code = 514, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
