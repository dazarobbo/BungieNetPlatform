<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumSubTopicCannotBeCreatedAtThisThreadLevel
 */
class ForumSubTopicCannotBeCreatedAtThisThreadLevelException extends PlatformException {

	public function __construct($message, $code = 529, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
