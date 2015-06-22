<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumLatestReplyAccessError
 */
class ForumLatestReplyAccessErrorException extends PlatformException {

	public function __construct($message, $code = 522, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
