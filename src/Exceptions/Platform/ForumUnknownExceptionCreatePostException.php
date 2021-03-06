<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumUnknownExceptionCreatePost
 */
class ForumUnknownExceptionCreatePostException extends PlatformException {

	public function __construct($message, $code = 507, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
