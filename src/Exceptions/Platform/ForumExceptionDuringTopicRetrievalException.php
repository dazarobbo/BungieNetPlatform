<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumExceptionDuringTopicRetrieval
 */
class ForumExceptionDuringTopicRetrievalException extends PlatformException {

	public function __construct($message, $code = 510, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
