<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumBannedPostsCannotBeEdited
 */
class ForumBannedPostsCannotBeEditedException extends PlatformException {

	public function __construct($message, $code = 562, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
