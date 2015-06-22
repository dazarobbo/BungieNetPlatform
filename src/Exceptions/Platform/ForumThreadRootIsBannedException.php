<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumThreadRootIsBanned
 */
class ForumThreadRootIsBannedException extends PlatformException {

	public function __construct($message, $code = 563, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
