<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumTopicDoesNotExist
 */
class ForumTopicDoesNotExistException extends PlatformException {

	public function __construct($message, $code = 531, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
