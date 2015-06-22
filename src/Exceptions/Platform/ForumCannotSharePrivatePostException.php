<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumCannotSharePrivatePost
 */
class ForumCannotSharePrivatePostException extends PlatformException {

	public function __construct($message, $code = 543, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
