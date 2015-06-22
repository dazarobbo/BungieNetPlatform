<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumSubjectCannotBeEmptyOnTopicPost
 */
class ForumSubjectCannotBeEmptyOnTopicPostException extends PlatformException {

	public function __construct($message, $code = 501, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
