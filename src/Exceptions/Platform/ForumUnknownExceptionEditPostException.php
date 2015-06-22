<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumUnknownExceptionEditPost
 */
class ForumUnknownExceptionEditPostException extends PlatformException {

	public function __construct($message, $code = 513, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
