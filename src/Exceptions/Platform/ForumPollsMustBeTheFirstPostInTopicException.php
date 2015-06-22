<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumPollsMustBeTheFirstPostInTopic
 */
class ForumPollsMustBeTheFirstPostInTopicException extends PlatformException {

	public function __construct($message, $code = 572, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
