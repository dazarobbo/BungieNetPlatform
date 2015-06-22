<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumCannotRateYourOwnPosts
 */
class ForumCannotRateYourOwnPostsException extends PlatformException {

	public function __construct($message, $code = 571, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
