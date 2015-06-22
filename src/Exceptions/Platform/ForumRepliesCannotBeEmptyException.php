<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumRepliesCannotBeEmpty
 */
class ForumRepliesCannotBeEmptyException extends PlatformException {

	public function __construct($message, $code = 527, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
