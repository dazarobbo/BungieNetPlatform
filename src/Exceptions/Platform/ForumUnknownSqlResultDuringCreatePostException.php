<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumUnknownSqlResultDuringCreatePost
 */
class ForumUnknownSqlResultDuringCreatePostException extends PlatformException {

	public function __construct($message, $code = 504, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
