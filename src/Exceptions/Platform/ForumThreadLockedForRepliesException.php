<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumThreadLockedForReplies
 */
class ForumThreadLockedForRepliesException extends PlatformException {

	public function __construct($message, $code = 503, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
