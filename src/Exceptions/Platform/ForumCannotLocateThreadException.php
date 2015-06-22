<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumCannotLocateThread
 */
class ForumCannotLocateThreadException extends PlatformException {

	public function __construct($message, $code = 512, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
